<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RepairableComponent implements ItemComponent {

	private array $items;
    private int|string $repair_amount;

	public function __construct(array $items = [], ?int $repair_amount = null) {
		$this->items = $items;
        $this->repair_amount = $repair_amount ?? "math.min(q.remaining_durability + c.other->q.remaining_durability + math.floor(q.max_durability /20), c.other->q.max_durability)"; // Vanilla formula
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