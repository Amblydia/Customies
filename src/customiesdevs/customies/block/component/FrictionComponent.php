<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class FrictionComponent implements BlockComponent {

	private float $friction;

	/**
	 * Describes the friction for this block in a range of (0.0-0.9). Friction affects an entity's movement speed when it travels on the block. Greater value results in more friction.
	 * @param float $friction
	 */
	public function __construct(float $friction = 0.4) {
		$this->friction = $friction;
	}

	public function getName(): string {
		return "minecraft:friction";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setFloat("value", $this->friction);
	}
}