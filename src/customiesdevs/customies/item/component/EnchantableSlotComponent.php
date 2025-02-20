<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use customiesdevs\customies\item\ItemDataTypes;

final class EnchantableSlotComponent implements ItemComponent {

	private string $slot;

	/**
	 * What enchantments can be applied (ex. Using bow would allow this item to be enchanted as if it were a bow).
	 * @param string $slot Specifies which types of enchantments can be applied. For example, `bow` would allow this item to be enchanted as if it were a bow
	 */
	public function __construct(string $slot = ItemDataTypes::SLOT_ALL) {
		$this->slot = $slot;
	}

	public function getName(): string {
		return "enchantable_slot";
	}

	public function getValue(): string {
		return $this->slot;
	}

	public function isProperty(): bool {
		return true;
	}
}