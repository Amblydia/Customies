<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class EnchantableValueComponent implements ItemComponent {

	private int $value;

	public function __construct(int $value = 0) {
		$this->value = $value;
	}

	public function getName(): string {
		return "enchantable_value";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}