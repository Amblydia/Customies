<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class EnchantableSlotComponent implements ItemComponent {

	private string $slot;

	public function __construct(string $slot) {
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