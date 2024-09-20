<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class MaxStackSizeProperty implements ItemComponent {

	private int $value;

	/**
	 * Determines how many of an item can be stacked together.
	 * @param int $value
	 */
	public function __construct(int $value = 64) {
		$this->value = $value;
	}

	public function getName(): string {
		return "max_stack_size";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}