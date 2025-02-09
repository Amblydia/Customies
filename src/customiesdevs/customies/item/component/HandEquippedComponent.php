<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class HandEquippedComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines if an item is rendered like a tool while in-hand.
	 * @param bool $value Default is set to `true`
	 * @throws \InvalidArgumentException if `$value` is not a boolean.
	 */
	public function __construct(bool $value = true) {
		if(!is_bool($value)){
			throw new \InvalidArgumentException("A boolean value (true or false) must be specified for 'value'");
		}
		$this->value = $value;
	}

	public function getName(): string {
		return "hand_equipped";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}