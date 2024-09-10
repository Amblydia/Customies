<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RepairableComponent implements ItemComponent {

	private array $items;
    private int|string $repair_amount;

	public function __construct(array $items, int|string $repair_amount) {
		$this->items = $items;
        $this->repair_amount = $repair_amount; 
	}

	public function getName(): string {
		return "minecraft:repairable";
	}

	public function getValue(): array {
		return [
			"repair_items" => [
                "items" => $this->items,
                "repair_amount" => $this->repair_amount
            ]
		];
	}

	public function isProperty(): bool {
		return false;
	}
}