<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class GeometryComponent implements BlockComponent {

	private string $geometry;

	/**
	 * The description identifier of the geometry to use to render this block. This identifier must either match an existing geometry identifier in any of the loaded resource packs or be one of the currently supported Vanilla identifiers: "minecraft:geometry.full_block" or "minecraft:geometry.cross".
	 * @param string $geometry
	 */
	public function __construct(string $geometry = "minecraft:geometry.full_block") {
		$this->geometry = $geometry;
	}

	public function getName(): string {
		return "minecraft:geometry";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setTag("bone_visibility", CompoundTag::create())
			->setString("culling", "")
			->setString("identifier", $this->geometry);
	}
}