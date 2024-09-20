<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class DamageProperty implements ItemComponent {

	private int $value;

	/**
	 * Determines how much extra damage an item does on attack. Note that this must be a positive value.
	 * @param int $value
	 */
	public function __construct(int $value) {
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