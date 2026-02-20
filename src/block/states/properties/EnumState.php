<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states\properties;

use customiesdevs\customies\block\states\BlockState;

class EnumState extends BlockState {

	/**
	 * Creates a new enum block state.
	 * 
	 * @param string $name The name of the state
	 * @param array $values The possible values for this state
	 * @param string|null $default The default value of the state (default: first value in the array)
	 */
	public function __construct(string $name, array $values, ?string $default = null) {
		parent::__construct($name, $values);
		$this->setCurrentValue($default ?? $values[0]);
	}
}