<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\vanilla;

use customiesdevs\customies\block\states\properties\BoolState;

/* Defines all placement directions of a block. */
class LitState extends BoolState {

	public function __construct(bool $lit = false){
		parent::__construct(
			name: "minecraft:lit",
			default: $lit
		);
	}
}