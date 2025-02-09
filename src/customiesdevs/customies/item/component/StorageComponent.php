<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use InvalidArgumentException;

final class StorageComponent implements ItemComponent {

	private bool $allow_nested_storage_items;
	private array $allowed_items = [];
	private array $banned_items = [];
	private int $max_slots;
	private int $max_weight_limit;
	private int $weight_in_storage_item;

	/**
	 * A dynamic container is a container for storing items that is linked to an item instead of a block or an entity.
	 * @param bool $allow_nested_storage_items Allows other items with a minecraft:storage_item component to be put inside it.
	 * @param int $max_slots Range: [`1` to `64`]. Defines the number of slots of the dynamic container; specifically, the number of unique items allowed in the storage item.
	 * @param int $max_weight_limit Range: [`1` to `64`] Defines the maximum allowed sum of the weight of the items in all slots of the dynamic container. Items that stack to `64` weigh `1` each, those that stack to `16` weigh `4` each, and unstackable items weigh `64`.
	 * @param int $weight_in_storage_item Range: [`0` to `64`] Defines the additional weight the item adds when inside another storage item. A value of `0` means that this item is not allowed inside another storage item.
	 * @throws InvalidArgumentException if `$allow_nested_storage_items` is not a boolean.
	 * @throws InvalidArgumentException if `$max_slots` is not in bound (`1`-`64`).
	 * @throws InvalidArgumentException if `$weight_in_storage_item` is not in bound (`0`-`64`).
	 */
	public function __construct(
		int $max_slots = 64,
		int $max_weight_limit = 64,
		int $weight_in_storage_item = 4,
		bool $allow_nested_storage_items = true
	) {
		if(!is_bool($allow_nested_storage_items)){
			throw new \InvalidArgumentException("A boolean value (true or false) must be specified for 'allow_nested_storage_items'");
		}
		if($max_slots < 1 || $max_slots > 64){
			throw new InvalidArgumentException("max_slots must be between 1 or 64");
		}
		if($weight_in_storage_item < 0 || $weight_in_storage_item > 64){
			throw new InvalidArgumentException("weight_in_storage_item must be between 0 or 64");
		}
		$this->allow_nested_storage_items = $allow_nested_storage_items;
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
			"allowed_items" => $this->allowed_items,
			"banned_items" => $this->banned_items,
			"max_slots" => $this->max_slots,
			"max_weight_limit" => $this->max_weight_limit,
			"weight_in_storage_item" => $this->weight_in_storage_item
		];
	}

	public function isProperty(): bool {
		return false;
	}

	public function addAllowedItems(array $items = []): StorageComponent {
        foreach ($items as $item) {
            $this->allowed_items[] = ["name" => "minecraft:" . $item];
        }
        return $this;
    }

    public function addBannedItems(array $items = []): StorageComponent {
        foreach ($items as $item) {
            $this->banned_items[] = ["name" => "minecraft:" . $item];
        }
        return $this;
    }
}