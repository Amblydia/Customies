<?php

namespace customiesdevs\customies\block\component;

use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;

class SelectionBoxComponent implements BlockComponent {

	private bool $useSelectionBox;
	private Vector3 $origin;
	private Vector3 $size;

	public function __construct(bool $useSelectionBox = true, ?Vector3 $origin = null, ?Vector3 $size = null) {
		$this->useSelectionBox = $useSelectionBox;
		$this->origin = $origin ?? new Vector3(-8.0, 0.0, -8.0);
		$this->size = $size ?? new Vector3(16.0, 16.0, 16.0);
	}

	public function getName(): string {
		return "minecraft:selection_box";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setByte("enabled", $this->useSelectionBox ? 1 : 0)
			->setTag("origin", new ListTag([
				new FloatTag($this->origin->getX()),
				new FloatTag($this->origin->getY()),
				new FloatTag($this->origin->getZ())
			]))
			->setTag("size", new ListTag([
				new FloatTag($this->size->getX()),
				new FloatTag($this->size->getY()),
				new FloatTag($this->size->getZ())
			]));
	}
}