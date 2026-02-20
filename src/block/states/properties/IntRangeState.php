<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\properties;

use customiesdevs\customies\block\states\BlockState;

class IntRangeState extends BlockState {

	/**
	 * Creates a new integer range block state.
	 * 
	 * @param string $name The name of the state
	 * @param int $min The minimum value of the range (default: 0)
	 * @param int $max The maximum value of the range (default: 15)
	 * @param int|null $default The default value of the state (default: minimum value)
	 */
	public function __construct(string $name, int $min = 0, int $max = 15, ?int $default = null) {
		parent::__construct($name, range($min, $max));
		$this->setCurrentValue($default ?? $min);
	}
}