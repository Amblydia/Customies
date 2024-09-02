<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class MaxStackSizeComponent implements ItemComponent {

	private int $maxStackSize;

	public function __construct(int $maxStackSize = 64) {
		$this->maxStackSize = $maxStackSize;
	}

	public function getName(): string {
		return "minecraft:max_stack_size";
	}

	public function getValue(): array {
		return ["value" => $this->maxStackSize];
	}

	public function isProperty(): bool {
		return false;
	}
}