<?php
declare(strict_types=1);

namespace customiesdevs\customies\item;

use customiesdevs\customies\item\component\AllowOffHandComponent;
use customiesdevs\customies\item\component\CanDestroyInCreativeComponent;
use customiesdevs\customies\item\component\CooldownComponent;
use customiesdevs\customies\item\component\CreativeCategoryComponent;
use customiesdevs\customies\item\component\CreativeGroupComponent;
use customiesdevs\customies\item\component\DamageAbsorptionComponent;
use customiesdevs\customies\item\component\DamageComponent;
use customiesdevs\customies\item\component\DiggerComponent;
use customiesdevs\customies\item\component\DisplayNameComponent;
use customiesdevs\customies\item\component\DurabilityComponent;
use customiesdevs\customies\item\component\DurabilitySensorComponent;
use customiesdevs\customies\item\component\DyeableComponent;
use customiesdevs\customies\item\component\EnchantableSlotComponent;
use customiesdevs\customies\item\component\EnchantableValueComponent;
use customiesdevs\customies\item\component\unknown_properties\BlockPlacerComponent;
use customiesdevs\customies\item\component\unknown_properties\FrameCountComponent;
use customiesdevs\customies\item\component\unknown_properties\MiningSpeedComponent;
use customiesdevs\customies\item\component\FoodComponent;
use customiesdevs\customies\item\component\FuelComponent;
use customiesdevs\customies\item\component\GlintComponent;
use customiesdevs\customies\item\component\HandEquippedComponent;
use customiesdevs\customies\item\component\HoverTextColorComponent;
use customiesdevs\customies\item\component\IconComponent;
use customiesdevs\customies\item\component\InteractButtonComponent;
use customiesdevs\customies\item\component\ItemComponent;
use customiesdevs\customies\item\component\ItemTagsComponent;
use customiesdevs\customies\item\component\LiquidClippedComponent;
use customiesdevs\customies\item\component\MaxStackSizeComponent;
use customiesdevs\customies\item\component\ProjectileComponent;
use customiesdevs\customies\item\component\RarityComponent;
use customiesdevs\customies\item\component\RecordComponent;
use customiesdevs\customies\item\component\RepairableComponent;
use customiesdevs\customies\item\component\SeedComponent;
use customiesdevs\customies\item\component\ShooterComponent;
use customiesdevs\customies\item\component\ShouldDespawnComponent;
use customiesdevs\customies\item\component\StackedByDataComponent;
use customiesdevs\customies\item\component\StorageItemComponent;
use customiesdevs\customies\item\component\StorageWeightLimitComponent;
use customiesdevs\customies\item\component\StorageWeightModifierComponent;
use customiesdevs\customies\item\component\TagsComponent;
use customiesdevs\customies\item\component\ThrowableComponent;
use customiesdevs\customies\item\component\UseAnimationComponent;
use customiesdevs\customies\item\component\UseDurationComponent;
use customiesdevs\customies\item\component\UseModifiersComponent;
use customiesdevs\customies\item\component\WearableComponent;
use customiesdevs\customies\item\ItemDataTypes;
use customiesdevs\customies\util\NBT;
use pocketmine\block\VanillaItems;
use pocketmine\block\VanillaBlocks;
use pocketmine\entity\Consumable;
use pocketmine\entity\FoodSource;
use pocketmine\inventory\ArmorInventory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\item\Armor;
use pocketmine\item\Axe;
use pocketmine\item\Durable;
use pocketmine\item\Food;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\item\LiquidBucket;
use pocketmine\item\Pickaxe;
use pocketmine\item\ProjectileItem;
use pocketmine\item\Releasable;
use pocketmine\item\Shovel;
use pocketmine\item\Sword;
use pocketmine\item\Tool;
use RuntimeException;

trait ItemComponentsTrait {

	/** @var ItemComponent[] */
	private array $components;

	public function addComponent(ItemComponent $component): void {
		$this->components[$component->getName()] = $component;
	}

	public function hasComponent(string $name): bool {
		return isset($this->components[$name]);
	}

	public function getComponents(): CompoundTag {
		$components = CompoundTag::create();
		$properties = CompoundTag::create();
		foreach($this->components as $component){
			$tag = NBT::getTagType($component->getValue());
			if($tag === null) {
				throw new RuntimeException("Failed to get tag type for component " . $component->getName());
			}
			if($component->isProperty()) {
				$properties->setTag($component->getName(), $tag);
				continue;
			}
			$components->setTag("item_properties", $properties);
			$components->setTag("item_tags", new ListTag([]));
			$components->setTag($component->getName(), $tag);
		}
		return CompoundTag::create()
			->setTag("components", $components);
	}

	/**
	 * Initializes the item with default components that are required for the item to function correctly.
	 */
	protected function initComponent(string $texture, ?CreativeInventoryInfo $creativeInfo = null): void {
		$creativeInfo ??= CreativeInventoryInfo::DEFAULT();
		$this->addComponent(new CreativeCategoryComponent($creativeInfo));
		$this->addComponent(new CreativeGroupComponent($creativeInfo));

		$this->addComponent(new IconComponent($texture));
		$this->addComponent(new MaxStackSizeComponent($this->getMaxStackSize()));
		$this->addComponent(new GlintComponent(false));
		$this->addComponent(new FrameCountComponent(1));
		$this->addComponent(new LiquidClippedComponent(false));
		$this->addComponent(new MiningSpeedComponent(1));
		$this->addComponent(new ShouldDespawnComponent(true));
		// $this->addComponent(new StackedByDataComponent(true));
		$this->addComponent(new UseAnimationComponent(ItemDataTypes::ANIMATION_NONE));
		if($this instanceof Item){
			$this->addComponent(new CanDestroyInCreativeComponent(true));
			$this->addComponent(new AllowOffHandComponent(false));
			$this->addComponent(new EnchantableSlotComponent(ItemDataTypes::SLOT_ALL));
			$this->addComponent(new EnchantableValueComponent(1));
			if($this->getName() !== "Unknown"){
				$this->addComponent(new DisplayNameComponent($this->getName()));
			}
			if($this->getFuelTime() > 0) {
				$this->addComponent(new FuelComponent($this->getFuelTime()));
				$this->addComponent(new TagsComponent([ItemDataTypes::TAG_FUEL]));
				$this->addComponent(new ItemTagsComponent([ItemDataTypes::TAG_FUEL]));
			}
			if($this->getCooldownTicks() > 0){
				$this->addComponent(new StackedByDataComponent(false));
				$this->addComponent(new CooldownComponent(CooldownComponent::CATEGORY_HORN, $this->getCooldownTicks()));
			}
			$this->addComponent(new RarityComponent(RarityComponent::RARITY_COMMON));
		}
		if($this instanceof Armor) {
			$slot = match ($this->getArmorSlot()) {
				ArmorInventory::SLOT_HEAD => ItemDataTypes::SLOT_ARMOR_HEAD,
				ArmorInventory::SLOT_CHEST => ItemDataTypes::SLOT_ARMOR_CHEST,
				ArmorInventory::SLOT_LEGS => ItemDataTypes::SLOT_ARMOR_LEGS,
				ArmorInventory::SLOT_FEET => ItemDataTypes::SLOT_ARMOR_FEET
			};
			$this->addComponent(new WearableComponent($slot, $this->getDefensePoints()));
			$this->addComponent(new TagsComponent([ItemDataTypes::TAG_IS_ARMOR]));
			$this->addComponent(new ItemTagsComponent([ItemDataTypes::TAG_IS_ARMOR]));
			$this->addComponent(new TagsComponent([ItemDataTypes::TAG_TRIMMABLE]));
			$this->addComponent(new ItemTagsComponent([ItemDataTypes::TAG_TRIMMABLE]));
			$this->addComponent(new StackedByDataComponent(false));
		}
		if($this instanceof Consumable) {
			if($this instanceof Food || $this instanceof FoodSource) {
				$this->addComponent(new FoodComponent(!$this->requiresHunger()));
				$this->addComponent(new TagsComponent([ItemDataTypes::TAG_IS_FOOD]));
				$this->addComponent(new ItemTagsComponent([ItemDataTypes::TAG_IS_FOOD]));
				$this->addComponent(new UseAnimationComponent(ItemDataTypes::ANIMATION_EAT));
				$this->addComponent(new UseAnimationComponent(ItemDataTypes::ANIMATION_EAT));
				$this->addComponent(new UseModifiersComponent(0.32, 1.6));
			}
			$this->addComponent(new UseModifiersComponent(0.35, 1.6));
			$this->addComponent(new TagsComponent([ItemDataTypes::TAG_IS_FOOD]));
			$this->addComponent(new ItemTagsComponent([ItemDataTypes::TAG_IS_FOOD]));
			$this->addComponent(new UseAnimationComponent(ItemDataTypes::ANIMATION_EAT));
			$this->addComponent(new UseAnimationComponent(ItemDataTypes::ANIMATION_EAT));
			
		}
		if($this instanceof Durable) {
			$this->addComponent(new DurabilityComponent($this->getMaxDurability()));
			$this->addComponent(new StackedByDataComponent(false));
		}
		if($this instanceof Tool) {
			$this->addComponent(new HandEquippedComponent(true));
			$this->addComponent(new StackedByDataComponent(false));
			if($this instanceof Sword){
				$this->addComponent(new CanDestroyInCreativeComponent(false));
				$this->addComponent(new EnchantableSlotComponent(ItemDataTypes::SLOT_SWORD));
				$this->addComponent(new EnchantableValueComponent(ItemDataTypes::TOOL_NETHERITE));
				if($this->getAttackPoints() > 0){
					$this->addComponent(new DamageComponent($this->getAttackPoints() - 1));
				}
			}
			if($this instanceof Pickaxe || $this instanceof Axe || $this instanceof Shovel){
				$this->addComponent(new DiggerComponent(true));
			}
		}
	}

	/**
	 * Set the number of seconds the item should be on cooldown for after being used. By default, the cooldown category
	 * will be the name of the item, but to share the cooldown across multiple items you can provide a shared category.
	 */
	protected function setUseCooldown(float $duration, string $category = ""): void {
		$this->addComponent(new CooldownComponent($category !== "" ? $category : $this->getName(), $duration));
	}
}
