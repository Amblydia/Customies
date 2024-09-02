<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class BreathabilityComponent implements BlockComponent {

	private string $breathability;

	public function __construct(string $breathability = "solid") {
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