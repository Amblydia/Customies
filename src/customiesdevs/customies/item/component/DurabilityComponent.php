<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DurabilityComponent implements ItemComponent {

	private int $maxDurability;
	private int $minChance;
	private int $maxChance;

	/**
	 * Sets how much damage the item can take before breaking, and allows the item to be combined at an anvil, grindstone, or crafting table.
	 * @param int $maxDurability Max durability is the amount of damage that this item can take before breaking
	 * @param int $minChance Specifies the percentage min chance of this item losing durability, Defaut is set to `0`
	 * @param int $maxChance Specifies the percentage max chance of this item losing durability, Defaut is set to `100`
	 * @throws \InvalidArgumentException if `$minChance`/`$maxChance` is below `0` or above `100`
	 */
	public function __construct(int $maxDurability, int $minChance = 0, int $maxChance = 100) {
		if(($minChance < 0 || $minChance > 100) || ($maxChance < 0 || $maxChance > 100)){
			throw new \InvalidArgumentException("damage chance must be above 0 or below 100");
		}
		$this->maxDurability = $maxDurability;
		$this->minChance = $minChance;
		$this->maxChance = $maxChance;
	}

	public function getName(): string {
		return "minecraft:durability";
	}

	public function getValue(): array {
		return [
			"damage_chance" => [
				"min" => $this->minChance,
				"max" => $this->maxChance
			],
			"max_durability" => $this->maxDurability
		];
	}

	public function isProperty(): bool {
		return false;
	}
}