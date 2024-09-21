<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DamageComponent implements ItemComponent {

	private int $value;

	/**
	 * Determines how much extra damage an item does on attack. Note that this must be a positive value.
	 * @param int $value
	 */
	public function __construct(int $value = 0) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:damage";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}