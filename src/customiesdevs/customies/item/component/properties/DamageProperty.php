<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;
use InvalidArgumentException;

final class DamageProperty implements ItemComponent {

	private int $value;

	/**
	 * Determines how much extra damage an item does on attack. Note that this must be a positive value.
	 * @param int $value Should be a Intger above `0`
	 * @throws InvalidArgumentException if `$value` is below `0`
	 */
	public function __construct(int $value) {
		if($value < 0){
			throw new InvalidArgumentException("value must be above 0");
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