<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class StorageWeightLimitComponent implements ItemComponent {

	private int $maxLimit;

	/**
	 * Defines the maximum allowed total weight of all items in the storage item container
	 * To calculate the weight of an item, divide 64 by its max stack size.
	 * Items that stack to 64 weigh 1 each, those that stack to 16 weigh 4 each and unstackable items weigh 64.
	 * @param int $maxLimit
	 * @throws \InvalidArgumentException if `$maxLimit` is out of bounds (1 to 64).
	 */
	public function __construct(int $maxLimit = 64) {
		if($maxLimit < 1 || $maxLimit > 64){
			throw new \InvalidArgumentException("maxLimit must be between 1 or 64");
		}
		$this->maxLimit = $maxLimit;
	}

	public function getName(): string {
		return "minecraft:storage_weight_limit";
	}

	public function getValue(): array {
		return [
			"max_weight_limit" => $this->maxLimit
		];
	}

	public function isProperty(): bool {
		return false;
	}
}