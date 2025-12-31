<?php
declare(strict_types=1);

namespace customiesdevs\customies\example;

use customiesdevs\customies\block\component\BlockComponents;
use customiesdevs\customies\block\component\BlockComponentsTrait;
use customiesdevs\customies\block\component\CollisionBoxComponent;
use customiesdevs\customies\block\component\GeometryComponent;
use customiesdevs\customies\block\component\MaterialInstancesComponent;
use customiesdevs\customies\block\component\TransformationComponent;
use customiesdevs\customies\block\permutations\BlockPermutation;
use customiesdevs\customies\block\permutations\BlockPermutations;
use customiesdevs\customies\block\permutations\BlockPermutationsTrait;
use customiesdevs\customies\block\properties\Material;
use customiesdevs\customies\block\states\BlockState;
use pocketmine\block\Block;
use pocketmine\block\BlockBreakInfo;
use pocketmine\block\BlockIdentifier;
use pocketmine\block\BlockTypeIds;
use pocketmine\block\BlockTypeInfo;
use pocketmine\block\utils\PillarRotationTrait;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\item\Item;
use pocketmine\math\Axis;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

class ExampleBlock extends Block implements BlockComponents, BlockPermutations {
	use BlockComponentsTrait;
	use BlockPermutationsTrait;
	use PillarRotationTrait;

	public function __construct() {
		parent::__construct(
			new BlockIdentifier(BlockTypeIds::newId()),
			"Template Log",
			new BlockTypeInfo(BlockBreakInfo::instant())
		);
		// Geometry - full block
		$this->addComponent(new GeometryComponent("minecraft:geometry.full_block"));
		$this->addComponent(new CollisionBoxComponent(false));
		// Material instances - bark on sides, tops on up/down
		$this->addComponent(new MaterialInstancesComponent([
			new Material(Material::TARGET_ALL, "bum_template_bark"),
			new Material(Material::TARGET_UP, "bum_template_tops"),
			new Material(Material::TARGET_DOWN, "bum_template_tops"),
		]));
        $this->addState(new BlockState("minecraft:block_face", ["north", "south", "east", "west", "up", "down"]));
		$this->setCurrentStates([$this->axis]);
        $this->addPermutations([
			new BlockPermutation(
				"q.block_state('minecraft:block_face') == 'west' || q.block_state('minecraft:block_face') == 'east'",
				new TransformationComponent(new Vector3(0, 0, 90))
			),
			new BlockPermutation(
				"q.block_state('minecraft:block_face') == 'down' || q.block_state('minecraft:block_face') == 'up'",
				new TransformationComponent(new Vector3(0, 0, 0))
			),
			new BlockPermutation(
				"q.block_state('minecraft:block_face') == 'north' || q.block_state('minecraft:block_face') == 'south'",
				new TransformationComponent(new Vector3(90, 0, 0))
			)
		]);
	}

	public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool {
		$this->axis = match($face) {
			0, 1 => Axis::Y,  // down, up
			2, 3 => Axis::Z,  // north, south
			4, 5 => Axis::X,  // west, east
			default => Axis::Y
		};
		return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
	}

	public function serializeState(BlockStateWriter $out): void {
		$rotation = match($this->axis) {
			Axis::X => "east",
			Axis::Y => "up",
			Axis::Z => "north",
			default => "down"
		};
		$out->writeString("minecraft:block_face", $rotation);
	}

	public function deserializeState(BlockStateReader $in): void {
		$this->axis = match($in->readString("minecraft:block_face")) {
			"east", "west" => Axis::X,
			"up", "down" => Axis::Y,
			"north", "south" => Axis::Z,
			default => Axis::Y
		};
	}
}
