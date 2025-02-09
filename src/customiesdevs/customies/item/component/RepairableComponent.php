<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RepairableComponent implements ItemComponent {

	private array $items = [];

	/**
	 * Repairable Component defines the items that can be used to repair a defined item, and the amount of durability each item restores upon repair. 
	 * Each entry needs to define a list of strings for 'items' that can be used for the repair and an optional 'repair_amount' for how much durability is repaired.
	 */
	public function __construct() {}

	public function getName(): string {
		return "minecraft:repairable";
	}

	public function getValue(): array {
		return [
			"repair_items" => [$this->items],
		];
	}

	public function withItems(array $items, int|string $repair_amount = 0): RepairableComponent {
			$this->items = [
				"items" => [],
				"repair_amount" => [
					"expression" => $repair_amount,
					"version" => 0
				]
			];
			foreach ($items as $item) {
				$this->items["items"][] = ["name" => $item];
			}
		return $this;
	}

	public function isProperty(): bool {
		return false;
	}
}