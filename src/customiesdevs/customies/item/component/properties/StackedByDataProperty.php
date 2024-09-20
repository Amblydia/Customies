<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class StackedByDataProperty implements ItemComponent {

	private bool $value;

	/**
	 * determines if the same item with different aux values can stack. 
	 * Additionally, this component defines whether the item actors can merge while floating in the world.
	 * @param bool $value
	 */
	public function __construct(bool $value = true) {
		$this->value = $value;
	}

	public function getName(): string {
		return "stacked_by_data";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}