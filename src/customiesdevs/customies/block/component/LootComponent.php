<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class LootComponent implements BlockComponent {

	private string $pathString;

	/**
	 * The path to the loot table, relative to the behavior pack. Path string is limited to 256 characters.
	 * @param string $pathString
	 */
	public function __construct(string $pathString) {
		$this->pathString = $pathString;
	}

	public function getName(): string {
		return "minecraft:loot";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setString("value", $this->pathString);
	}
}