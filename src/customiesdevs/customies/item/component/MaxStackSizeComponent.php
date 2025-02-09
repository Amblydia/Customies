<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class MaxStackSizeComponent implements ItemComponent {

	private int $value;

	/**
	 * Determines how many of an item can be stacked together.
	 * @param int $value Max Size, Default is set to `64`
	 * @throws \InvalidArgumentException if `$value` is out of bounds (`1` to `64`)
	 */
	public function __construct(int $value = 64) {
		if($value < 1 || $value > 64){
			throw new \InvalidArgumentException("movementModifier must be between 1 or 64");
		}
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