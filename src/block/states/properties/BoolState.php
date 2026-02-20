<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\properties;

use customiesdevs\customies\block\states\BlockState;

class BoolState extends BlockState {

	/**
	 * Creates a new boolean block state.
	 * 
	 * @param string $name The name of the state
	 * @param bool $default The default value of the state (default: false)
	 */
	public function __construct(string $name, bool $default = false) {
		parent::__construct($name, [false, true]);
		$this->setCurrentValue($default);
	}
}