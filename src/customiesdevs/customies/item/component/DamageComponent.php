<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DamageComponent implements ItemComponent {

	private int $value;

	/**
	 * Determines how much extra damage an item does on attack.
	 * @param int $value Note that this must be a positive value.
	 * @throws \InvalidArgumentException if `$value` is not a positive value.
	 */
	public function __construct(int $value) {
		if($value < 0){
			throw new \InvalidArgumentException("value variable must be above or equal of 0");
		}
		$this->value = $value;
	}

	public function getName(): string {
		return "damage";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}