<?php
declare(strict_types=1);

namespace customiesdevs\customies\block;

use Closure;
use customiesdevs\customies\block\permutations\BlockPermutation;
use customiesdevs\customies\block\permutations\BlockPermutations;
use customiesdevs\customies\block\permutations\Permutations;
use customiesdevs\customies\block\component\BlockComponents;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\CustomiesItemFactory;
use customiesdevs\customies\task\AsyncRegisterBlocksTask;
use customiesdevs\customies\util\NBT;
use InvalidArgumentException;
use pocketmine\block\Block;
use pocketmine\block\RuntimeBlockStateRegistry;
use pocketmine\data\bedrock\block\BlockStateData;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\inventory\CreativeCategory;
use pocketmine\inventory\CreativeGroup;
use pocketmine\inventory\CreativeInventory;
use pocketmine\lang\Translatable;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\network\mcpe\protocol\types\BlockPaletteEntry;
use pocketmine\network\mcpe\protocol\types\CacheableNbt;
use pocketmine\Server;
use pocketmine\utils\AssumptionFailedError;
use pocketmine\utils\SingletonTrait;
use pocketmine\world\format\io\GlobalBlockStateHandlers;
use RuntimeException;

use function array_map;
use function array_reverse;
use function hash;
use function strcmp;
use function usort;

final class CustomiesBlockFactory {
	use SingletonTrait;

	/**
	 * @var Closure[]
	 * @phpstan-var array<string, array{(Closure(int): Block), (Closure(BlockStateWriter): Block), (Closure(Block): BlockStateReader)}>
	 */
	private array $blockFuncs = [];
	/** @var BlockPaletteEntry[] */
	private array $blockPaletteEntries = [];
	/** @var array<string, Block> Map of block identifiers to block instances */
	private array $customBlocks = [];
	/** @var array<string, CreativeGroup> Map of group names to creative groups */
	private array $groups = [];

	/**
	 * Adds a worker initialize hook to the async pool to sync the BlockFactory for every thread worker that is created.
	 * It is especially important for the workers that deal with chunk encoding, as using the wrong runtime ID mappings
	 * can result in massive issues with almost every block showing as the wrong thing and causing lag to clients.
	 */
	public function addWorkerInitHook(): void {
		$server = Server::getInstance();
		$blocks = $this->blockFuncs;
		$server->getAsyncPool()->addWorkerStartHook(static function (int $worker) use ($server, $blocks): void {
			$server->getAsyncPool()->submitTaskToWorker(new AsyncRegisterBlocksTask($blocks), $worker);
		});
	}

	/**
	 * Get a custom block from its identifier. An exception will be thrown if the block is not registered.
	 * @param string $identifier Unique block identifier (e.g. "namespace:block_name")
	 * @throws InvalidArgumentException If the block is not registered
	 * @return Block A clone of the registered block.
	 */
	public function get(string $identifier): Block {
		return clone (
			$this->customBlocks[$identifier] ??
			throw new InvalidArgumentException("Custom block $identifier is not registered")
		);
	}

	/**
	 * Loads all the creative groups from the CreativeInventory entries. This is used to ensure that all groups are
	 * available when registering new blocks with creative inventory info.
	 */
	private function loadGroups() : void {
		if($this->groups !== []){
			return;
		}
		foreach(CreativeInventory::getInstance()->getAllEntries() as $entry){
			$group = $entry->getGroup();
			if($group !== null){
				$this->groups[$group->getName()->getText()] = $group;
			}
		}
	}

	/**
	 * Returns all the block palette entries that need to be sent to the client.
	 * @return BlockPaletteEntry[]
	 */
	public function getBlockPaletteEntries(): array {
		return $this->blockPaletteEntries;
	}

	/**
	 * Register a block to the BlockFactory and all the required mappings. A custom stateReader and stateWriter can be
	 * provided to allow for custom block state serialization.
	 * @param Closure $blockFunc A closure that returns a new instance of the block to register.
	 * @param string $identifier The unique identifier for the block (e.g. "namespace:block_name").
	 * @param CreativeInventoryInfo|null $creativeInfo Optional creative inventory information for the block.
	 * @param Closure|null $serializer Optional closure that takes a BlockStateWriter and returns it after writing the block state.
	 * @param Closure|null $deserializer Optional closure that takes a BlockStateReader and returns a new instance of the block after reading the state.
	 * @throws InvalidArgumentException If the blockFunc does not return a Block instance.
	 */
	public function registerBlock(
		Closure $blockFunc,
		string $identifier,
		?CreativeInventoryInfo $creativeInfo = new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_ITEMS),
		?Closure $serializer = null,
		?Closure $deserializer = null
	): void {
		$block = $blockFunc();
		if(!$block instanceof Block) {
			throw new InvalidArgumentException("Class returned from closure is not a Block");
		}

		RuntimeBlockStateRegistry::getInstance()->register($block);
		CustomiesItemFactory::getInstance()->registerBlockItem($identifier, $block);
		$this->customBlocks[$identifier] = $block;

		$nbt = CompoundTag::create();
		$components = CompoundTag::create();

		$nbt->setTag("menu_category", CompoundTag::create()
			->setString("category", $creativeInfo->getCategory())
			->setString("group", $creativeInfo->getGroup())
			->setByte("is_hidden_in_commands", 0));

		// Handle block components
		if($block instanceof BlockComponents) {
			foreach ($block->getComponents() as $component) {
				$tag = NBT::getTagType($component->getValue());
				if($tag === null) {
					throw new RuntimeException("Failed to get tag type for component " . $component->getName());
				}
				$components->setTag($component->getName(), $tag);
			}
		}

		// Handle block permutations and states
		if($block instanceof BlockPermutations) {
			$blockPropertyNames = $blockPropertyValues = $blockProperties = [];
			foreach($block->getStates() as $blockProperty){
				$blockPropertyNames[] = $blockProperty->getName();
				$blockPropertyValues[] = $blockProperty->getValues();
				$blockProperties[] = NBT::getTagType($blockProperty->getValue());
			}
			$permutations = array_map(static fn(BlockPermutation $permutation) => NBT::getTagType($permutation->toArray()), $block->getPermutations());

			// The 'minecraft:on_player_placing' component is required for the client to predict block placement, making
			// it a smoother experience for the end-user.
			$components->setTag("minecraft:on_player_placing", CompoundTag::create());
			$nbt->setTag("permutations", new ListTag($permutations))
				->setTag("properties", new ListTag(array_reverse($blockProperties))); // fix client-side order

			foreach(Permutations::getCartesianProduct($blockPropertyValues) as $meta => $permutations){
				// We need to insert states for every possible permutation to allow for all blocks to be used and to
				// keep in sync with the client's block palette.
				$states = CompoundTag::create();
				foreach($permutations as $i => $value){
					$states->setTag($blockPropertyNames[$i], NBT::getTagType($value));
				}
				$blockState = CompoundTag::create()
					->setString(BlockStateData::TAG_NAME, $identifier)
					->setTag(BlockStateData::TAG_STATES, $states);
				BlockPalette::getInstance()->insertState($blockState, $meta);
			}

			$serializer ??= static function (BlockPermutations $block) use ($identifier, $blockPropertyNames) : BlockStateWriter {
				$b = BlockStateWriter::create($identifier);
				$block->serializeState($b);
				return $b;
			};
			$deserializer ??= static function (BlockStateReader $in) use ($block, $identifier, $blockPropertyNames) : BlockPermutations {
				$b = CustomiesBlockFactory::getInstance()->get($identifier);
				assert($b instanceof BlockPermutations);
				$b->deserializeState($in);
				return $b;
			};
		} else {
			// If a block does not contain any permutations we can just insert the one state.
			$blockState = CompoundTag::create()
				->setString(BlockStateData::TAG_NAME, $identifier)
				->setTag(BlockStateData::TAG_STATES, CompoundTag::create());
			BlockPalette::getInstance()->insertState($blockState);
			$serializer ??= static fn() => new BlockStateWriter($identifier);
			$deserializer ??= static fn(BlockStateReader $in) => $block;
		}
		GlobalBlockStateHandlers::getSerializer()->map($block, $serializer);
		GlobalBlockStateHandlers::getDeserializer()->map($identifier, $deserializer);

		$nbt->setTag("components", $components);
		$nbt->setInt("molangVersion", 13);

		if($creativeInfo !== null){
			$this->loadGroups();
			if($creativeInfo->getCategory() === CreativeInventoryInfo::CATEGORY_ALL || $creativeInfo->getCategory() === CreativeInventoryInfo::CATEGORY_COMMANDS){
				return;
			}

			$group = $this->groups[$creativeInfo->getGroup()] ?? ($creativeInfo->getGroup() !== "" && $creativeInfo->getGroup() !== CreativeInventoryInfo::NONE ? new CreativeGroup(
				new Translatable($creativeInfo->getGroup()),
				$block->asItem()
			) : null);

			if($group !== null){
				$this->groups[$group->getName()->getText()] = $group;
			}

			$category = match ($creativeInfo->getCategory()) {
				CreativeInventoryInfo::CATEGORY_CONSTRUCTION => CreativeCategory::CONSTRUCTION,
				CreativeInventoryInfo::CATEGORY_ITEMS => CreativeCategory::ITEMS,
				CreativeInventoryInfo::CATEGORY_NATURE => CreativeCategory::NATURE,
				CreativeInventoryInfo::CATEGORY_EQUIPMENT => CreativeCategory::EQUIPMENT,
				default => throw new AssumptionFailedError("Unknown Creative Category")
			};

			CreativeInventory::getInstance()->add($block->asItem(), $category, $group);
		}

		$this->blockPaletteEntries[] = new BlockPaletteEntry($identifier, new CacheableNbt($nbt));
		$this->blockFuncs[$identifier] = [$blockFunc, $serializer, $deserializer];

		// 1.20.60 added a new "block_id" field which depends on the order of the block palette entries. Every time we
		// insert a new block, we need to re-sort the block palette entries to keep in sync with the client.
		usort($this->blockPaletteEntries, static function(BlockPaletteEntry $a, BlockPaletteEntry $b): int {
			return strcmp(hash("fnv164", $a->getName()), hash("fnv164", $b->getName()));
		});
		foreach($this->blockPaletteEntries as $i => $entry) {
			$root = $entry->getStates()->getRoot();
			$root->setTag("vanilla_block_data", CompoundTag::create()->setInt("block_id", 10000 + $i));
			$this->blockPaletteEntries[$i] = new BlockPaletteEntry($entry->getName(), new CacheableNbt($root));
		}
	}
}