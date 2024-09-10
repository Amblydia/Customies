<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class MiningSpeedComponent implements ItemComponent {

	private float $speed;

	public function __construct(float $speed) {
		$this->speed = $speed;
	}

	public function getName(): string {
		return "mining_speed";
	}

	public function getValue(): float {
		return $this->speed;
	}

	public function isProperty(): bool {
		return true;
	}
}