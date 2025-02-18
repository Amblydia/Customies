<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use InvalidArgumentException;

final class BundleWeightModifierComponent implements ItemComponent {

	private int $weight_in_storage_item;

	/**
	 * Enables the bundle interface and functionality on the item.
	 * @param int $weight_in_storage_item
	 * @throws InvalidArgumentException if `$weight_in_storage_item` is out of bounds (1 to 64).
	 */
	public function __construct(int $weight_in_storage_item = 4) {
		if($weight_in_storage_item < 1 || $weight_in_storage_item > 64){
			throw new InvalidArgumentException("weight_in_storage_item must be between 1 or 64");
		}
		$this->weight_in_storage_item = $weight_in_storage_item;
	}

	public function getName(): string {
		return "minecraft:storage_weight_modifier";
	}

	public function getValue(): array {
		return [
			"weight_in_storage_item" => $this->weight_in_storage_item
		];
	}

	public function isProperty(): bool {
		return false;
	}
}