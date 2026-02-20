<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\vanilla;

use customiesdevs\customies\block\states\properties\EnumState;

/* Determines the color of a block, if that block can be different colors. */
class ColorState extends EnumState {

	public function __construct(string $color = "white"){
		parent::__construct(
			name: "minecraft:color",
			values: ["white", "orange", "magenta", "light_blue", "yellow", "lime", "pink", "gray", "silver", "cyan", "purple", "blue", "brown", "green", "red", "black"],
			default: $color
		);
	}
}