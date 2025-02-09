<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

trait BlockTrait{

	public function addPlacementDirection(int $y_rot = 0, bool $facing = true, bool $cardinal = false): CompoundTag {
		return CompoundTag::create()
			->setTag("traits", new ListTag(
                [
                    "enabled_states" => (CompoundTag::create()
                        ->setByte("cardinal_direction", $cardinal ? 1 : 0)
                        ->setByte("facing_direction", $facing ? 1 : 0)
                    ),
                    "name" => "minecraft:placement_direction",
                    "y_rotation_offset" => $y_rot
                ]
            ));
	}

    public function addPlacementPosition(bool $block_face = false, bool $vertical_half = false): CompoundTag {
		return CompoundTag::create()
			->setTag("traits", new ListTag(
                [
                    "enabled_states" => (CompoundTag::create()
                        ->setByte("block_face", $block_face ? 1 : 0)
                        ->setByte("vertical_half", $vertical_half ? 1 : 0)
                    ),
                    "name" => "minecraft:placement_position"
                ]
            ));
	}
}