<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

class PlacementFilterComponent implements BlockComponent {

	private ?array $allowed_faces;
	private array $block_filter = [];

	/**
	 * Sets rules for under what conditions the block can be placed/survive
	 * @param ?array $allowed_faces List of any of the following strings describing which face(s) this block can be placed on: "up", "down", "north", "south", "east", "west", "side", "all". Limited to 6 faces.
	 * @param array $block_filter List of blocks that this block can be placed against in the "allowed_faces" direction
	 */
	public function __construct(?array $allowed_faces = null, array $block_filter) {
		$this->allowed_faces = $allowed_faces ?? ["all"];
		$this->block_filter = $block_filter;
	}

	public function getName(): string {
		return "minecraft:placement_filter";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setTag("conditions", CompoundTag::create())
				->setTag("allowed_faces", new ListTag($this->allowed_faces))
				->setTag("block_filter", new ListTag($this->block_filter));
	}
}