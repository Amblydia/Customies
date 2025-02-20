<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use customiesdevs\customies\item\ItemDataTypes;

final class UseAnimationComponent implements ItemComponent {

	private int $value;

	/**
	 * Determines which animation plays when using an item.
	 * @param int $value Specifies which animation to play when the the item is used, Default is set to `NONE`
	 */
	public function __construct(int $value = ItemDataTypes::ANIMATION_NONE) {
		$this->value = $value;
	}

	public function getName(): string {
		return "use_animation";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}