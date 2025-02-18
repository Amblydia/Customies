<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use InvalidArgumentException;

final class BundleWeightLimitComponent implements ItemComponent {

	private int $max_weight_limit;

	/**
	 * Enables the bundle interface and functionality on the item.
	 * @param int $max_weight_limit
	 * @throws InvalidArgumentException if `$max_weight_limit` is out of bounds (1 to 64).
	 */
	public function __construct(int $max_weight_limit = 64) {
		if($max_weight_limit < 1 || $max_weight_limit > 64){
			throw new InvalidArgumentException("max_weight_limit must be between 1 or 64");
		}
		$this->max_weight_limit = $max_weight_limit;
	}

	public function getName(): string {
		return "minecraft:storage_weight_limit";
	}

	public function getValue(): array {
		return [
			"max_weight_limit" => $this->max_weight_limit
		];
	}

	public function isProperty(): bool {
		return false;
	}
}