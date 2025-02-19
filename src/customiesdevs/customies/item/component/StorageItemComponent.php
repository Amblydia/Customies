<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class StorageItemComponent implements ItemComponent {
	
	private array $allowed_items = [];
	private array $banned_items = [];
	private bool $allow_nested_storage_items;
	private int $max_slots;
	/**
	 * A dynamic container is a container for storing items that is linked to an item instead of a block or an entity.
	 * @param bool $allow_nested_storage_items Allows other items with a minecraft:storage_item component to be put inside it.
	 * @param int $max_slots Range: [`1` to `64`]. Defines the number of slots of the dynamic container; specifically, the number of unique items allowed in the storage item.
	 * @throws \InvalidArgumentException if `$allow_nested_storage_items` is not a boolean.
	 * @throws \InvalidArgumentException if `$max_slots` is not in bound (`1`-`64`).
	 */
	public function __construct(
		int $max_slots = 64,
		bool $allow_nested_storage_items = true
	) {
		if(!is_bool($allow_nested_storage_items)){
			throw new \InvalidArgumentException("A boolean value (true or false) must be specified for 'allow_nested_storage_items'");
		}
		if($max_slots < 1 || $max_slots > 64){
			throw new \InvalidArgumentException("max_slots must be between 1 or 64");
		}
		$this->allow_nested_storage_items = $allow_nested_storage_items;
		$this->max_slots = $max_slots;
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
		];
	}

	public function isProperty(): bool {
		return false;
	}

	public function addAllowedItems(array $items = []): StorageItemComponent {
        foreach ($items as $item) {
            $this->allowed_items[] = ["name" => "minecraft:" . $item];
        }
        return $this;
    }

    public function addBannedItems(array $items = []): StorageItemComponent {
        foreach ($items as $item) {
            $this->banned_items[] = ["name" => "minecraft:" . $item];
        }
        return $this;
    }
}