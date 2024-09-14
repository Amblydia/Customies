<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class FuelComponent implements ItemComponent {

	private float|int $duration;

	public function __construct(float|int $duration = 0.05) {
		$this->duration = $duration;
	}

	public function getName(): string {
		return "minecraft:fuel";
	}

	public function getValue(): array {
		return [
			"duration" => $this->duration
		];
	}

	public function isProperty(): bool {
		return false;
	}
}