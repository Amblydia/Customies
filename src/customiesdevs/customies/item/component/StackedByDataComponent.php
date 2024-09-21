<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class StackedByDataComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines if the same item with different aux values can stack. 
	 * Additionally, this component defines whether the item actors can merge while floating in the world.
	 * @param bool $value
	 */
	public function __construct(bool $value = false) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:stacked_by_data";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}