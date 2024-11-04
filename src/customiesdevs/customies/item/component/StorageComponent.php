<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

// Todo: Create the items and banned items similar to Digger/block_placer like
final class StorageComponent implements ItemComponent {

	private bool $allow_nested_storage_items;
	private array $items;
	private array $banned_items;
	private int $max_slots;
	private int $max_weight_limit;
	private int $weight_in_storage_item;

	public function __construct(
		array $items,
		array $banned_items,
		int $max_slots = 64,
		int $max_weight_limit = 64,
		int $weight_in_storage_item = 4,
		bool $allow_nested_storage_items = true
	) {
		$this->allow_nested_storage_items = $allow_nested_storage_items;
		$this->items = $items;
		$this->banned_items = $banned_items;
		$this->max_slots = $max_slots;
		$this->max_weight_limit = $max_weight_limit;
		$this->weight_in_storage_item = $weight_in_storage_item;
	}

	public function getName(): string {
		return "minecraft:storage_item";
	}

	public function getValue(): array {
		return [
			"allow_nested_storage_items" => $this->allow_nested_storage_items,
			"allowed_items" => $this->items,
			"banned_items" => $this->banned_items,
			"max_slots" => $this->max_slots,
			"max_weight_limit" => $this->max_weight_limit,
			"weight_in_storage_item" => $this->weight_in_storage_item
		];
	}

	public function isProperty(): bool {
		return false;
	}
}