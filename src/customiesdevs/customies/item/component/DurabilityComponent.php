<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DurabilityComponent implements ItemComponent {

	private int $maxDurability;
	private int $min;
	private int $max;

	/**
	 * Sets how much damage the item can take before breaking, and allows the item to be combined at an anvil, grindstone, or crafting table.
	 * @param int $maxDurability Max durability is the amount of damage that this item can take before breaking
	 * @param int $min Specifies the percentage min chance of this item losing durability, Defaut is set to `100`
	 * @param int $max Specifies the percentage max chance of this item losing durability, Defaut is set to `100`
	 * @throws \InvalidArgumentException if `$min`/`$max` is below `0` or above `15000`
	 */
	public function __construct(int $maxDurability, int $min = 100, int $max = 100) {
		if(($min < 0 || $min > 15000) || ($max < 0 || $max > 15000)){
			throw new \InvalidArgumentException("chance must be above 0 or below 15000");
		}
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