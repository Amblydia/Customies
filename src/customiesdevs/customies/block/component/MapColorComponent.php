<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class MapColorComponent implements BlockComponent {

	private string $hexString;

	/**
	 * Sets the color of the block when rendered to a map. The color is represented as a hex value in the format "#RRGGBB". May also be expressed as an array of [R, G, B] from 0 to 255. If this component is omitted, the block will not show up on the map.
	 * @param string $hexString
	 */
	public function __construct(string $hexString) {
		$this->hexString = $hexString;
	}

	public function getName(): string {
		return "minecraft:map_color";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setString("value", $this->hexString);
	}
}