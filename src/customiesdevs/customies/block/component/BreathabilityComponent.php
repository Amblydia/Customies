<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class BreathabilityComponent implements BlockComponent {

	private string $breathability;

	public const SOLID = "solid";
	public const AIR = "air";

	public function __construct(string $breathability = self::SOLID) {
		$this->breathability = $breathability;
	}

	public function getName(): string {
		return "minecraft:breathability";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setString("value", $this->breathability);
	}
}