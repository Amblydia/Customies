<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class FrictionComponent implements BlockComponent {

    private float $decimal;

    public function __construct(float $decimal = 0.4) {
		$this->decimal = $decimal;
	}

    public function getName(): string {
        return "minecraft:friction";
    }

    public function getValue(): CompoundTag {
        return CompoundTag::create()
            ->setFloat("value", $this->decimal);
    }
}