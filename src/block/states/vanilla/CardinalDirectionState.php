<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\vanilla;

use customiesdevs\customies\block\states\properties\EnumState;

/* Defines the cardinal placement direction of a block. */
class CardinalDirectionState extends EnumState {

	public function __construct(string $face = "north"){
		parent::__construct(
			name: "minecraft:cardinal_direction",
			values: ["north", "south", "west", "east"],
			default: $face
		);
	}
}