<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class LightEmissionComponent implements BlockComponent {

    private int $integer;

    public function __construct(int $integer = 0) {
		$this->integer = $integer;
	}

    public function getName(): string {
        return "minecraft:light_emission";
    }

    public function getValue(): CompoundTag {
        return CompoundTag::create()
            ->setByte("emission", $this->integer);
    }
}