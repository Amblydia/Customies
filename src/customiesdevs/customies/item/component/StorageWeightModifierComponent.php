<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class StorageWeightModifierComponent implements ItemComponent {

	private int $weight;

	/**
	 * Defines the additional weight the item adds when inside another storage item.
	 * A value of 0 means that this item is not allowed inside another storage item.
	 * @param int $weight
	 * @throws \InvalidArgumentException if `$weight` is out of bounds (1 to 64).
	 */
	public function __construct(int $weight = 4) {
		if($weight < 1 || $weight > 64){
			throw new \InvalidArgumentException("weight must be between 1 or 64");
		}
		$this->weight = $weight;
	}

	public function getName(): string {
		return "minecraft:storage_weight_modifier";
	}

	public function getValue(): array {
		return [
			"weight_in_storage_item" => $this->weight
		];
	}

	public function isProperty(): bool {
		return false;
	}
}