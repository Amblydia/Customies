<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DurabilityComponent implements ItemComponent {

	private int $maxDurability;
	private int $min;
	private int $max;

	/**
	 * Sets how much damage the item can take before breaking, and allows the item to be combined at an anvil, grindstone, or crafting table.
	 * @param int $maxDurability
	 * @param int $min
	 * @param int $max
	 */
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
			"damage_chance" => [
				"min" => $this->min,
				"max" => $this->max
			],
			"max_durability" => $this->maxDurability
		];
	}

	public function isProperty(): bool {
		return false;
	}
}