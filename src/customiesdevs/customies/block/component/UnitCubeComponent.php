<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

# This feature were previously applicable but are no longer available.
# Specified that a unit cube was to be used with tessellation.
# The render capabilities were succeeded by the minecraft:geometry.full_block description identifier.
# This was supposed to set when geometry is empty
class UnitCubeComponent implements BlockComponent {

	public function __construct(){
        
    }

	public function getName(): string {
		return "minecraft:unit_cube";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create();
	}
}