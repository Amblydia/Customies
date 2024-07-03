<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class LightDampeningComponent implements BlockComponent {

    private int $integer;

    public function __construct(int $integer = 15) {
		$this->integer = $integer;
	}

    public function getName(): string {
        return "minecraft:light_dampening";
    }

    public function getValue(): CompoundTag {
        return CompoundTag::create()
            ->setByte("lightLevel", $this->integer);
    }
}