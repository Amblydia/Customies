<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\vanilla;

use customiesdevs\customies\block\states\properties\EnumState;

/* Which block face the player placed the block on. */
class BlockFaceState extends EnumState {

	public function __construct(string $face = "down"){
		parent::__construct(
			name: "minecraft:block_face",
			values: ["down", "up", "north", "south", "west", "east"],
			default: $face
		);
	}
}