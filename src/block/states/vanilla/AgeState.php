<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\vanilla;

use customiesdevs\customies\block\states\properties\IntRangeState;

/* Represents the age of the block */
class AgeState extends IntRangeState {

	public function __construct(int $age = 0){
		parent::__construct(
			name: "minecraft:age",
			min: 0,
			max: 15,
			default: $age
		);
	}
}