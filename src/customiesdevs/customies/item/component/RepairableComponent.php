<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RepairableComponent implements ItemComponent {

	private array $items = [];

	public function __construct() {
	}

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
				"items" => [	
				],
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