<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class MiningSpeedProperty implements ItemComponent {

	private float $value;

	public function __construct(float $value) {
		$this->value = $value;
	}

	public function getName(): string {
		return "mining_speed";
	}

	public function getValue(): float {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}