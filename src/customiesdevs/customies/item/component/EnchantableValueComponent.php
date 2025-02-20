<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use customiesdevs\customies\item\ItemDataTypes;

final class EnchantableValueComponent implements ItemComponent {

	private int $value;

	/**
	 * The value of the enchantment (minimum of 0).
	 * @param int $value Specifies the value of the enchantment, Default is set to `1`
	 * @throws \InvalidArgumentException if `$value` is below `0`
	 */
	public function __construct(int $value = ItemDataTypes::TOOL_OTHER) {
		if($value < 0){
			throw new \InvalidArgumentException("value must be above or equal of 0");
		}
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