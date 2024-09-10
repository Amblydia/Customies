<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class LiquidClippedComponent implements ItemComponent {

	private bool $liquidClipped;

	public function __construct(bool $liquidClipped) {
		$this->liquidClipped = $liquidClipped;
	}

	public function getName(): string {
		return "liquid_clipped";
	}

	public function getValue(): bool {
		return $this->liquidClipped;
	}

	public function isProperty(): bool {
		return true;
	}
}