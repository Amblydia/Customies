<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class CanDestroyInCreativeComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines if the item will break blocks in Creative Mode while swinging.
	 * @param bool $value
	 */
	public function __construct(bool $value = true) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:can_destroy_in_creative";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}