<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DurabilityComponent implements ItemComponent {

	private int $maxDurability;
	private int $min;
	private int $max;

	public function __construct(int $maxDurability, int $min = 100, int $max = 100) {
		$this->maxDurability = $maxDurability;
		$this->min = $min;
		$this->max = $max;
	}

	public function getName(): string {
		return "minecraft:durability";
	}

	public function getValue(): array {
		return [
			"max_durability" => $this->maxDurability,
			"damage_chance" => [
				"min" => $this->min,
				"max" => $this->max
			]
		];
	}

	public function isProperty(): bool {
		return false;
	}
}