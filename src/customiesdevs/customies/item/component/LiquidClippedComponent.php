<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class LiquidClippedComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines whether an item interacts with liquid blocks on use.
	 * @param bool $value
	 */
	public function __construct(bool $value = false) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:liquid_clipped";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}