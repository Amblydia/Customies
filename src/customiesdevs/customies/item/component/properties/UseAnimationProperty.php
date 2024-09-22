<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class UseAnimationProperty implements ItemComponent {

	public const ANIMATION_NONE = 0; // None
	public const ANIMATION_EAT = 1; // Eat
	public const ANIMATION_DRINK = 2; // Drink
	public const ANIMATION_BLOCK = 3; // Block
	public const ANIMATION_BOW = 4; // Bow
	public const ANIMATION_CAMERA = 5; // Camera
	public const ANIMATION_SPEAR = 6; // Spear
	public const ANIMATION_CROSSBOW = 9; // Crossbow
	public const ANIMATION_SPYGLASS = 10; // SpyGlass
	public const ANIMATION_BRUSH = 12; // Brush

	private int $value;

	/**
	 * Determines which animation plays when using an item.
	 * @param int $value Specifies which animation to play when the the item is used, Default is set to `0`
	 */
	public function __construct(int $value = self::ANIMATION_NONE) {
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