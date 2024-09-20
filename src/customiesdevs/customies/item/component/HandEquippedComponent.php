<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class HandEquippedComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines if an item is rendered like a tool while in-hand.
	 * @param bool $value
	 */
	public function __construct(bool $value = true) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:hand_equipped";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}