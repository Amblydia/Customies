<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class AllowOffHandComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determine whether an item can be placed in the off-hand slot of the inventory.
	 * @param bool $value
	 * @throws \InvalidArgumentException if `$value` variable is not a boolean.
	 */
	public function __construct(bool $value) {
		if(!is_bool($value)){
			throw new \InvalidArgumentException("A boolean value (true or false) must be specified for variable 'value'");
		}
		$this->value = $value;
	}

	public function getName(): string {
		return "allow_off_hand";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}