<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class UseAnimationProperty implements ItemComponent {

	public const ANIMATION_EAT = "eat";
	public const ANIMATION_DRINK = "drink";
	public const ANIMATION_BOW = "bow";
	public const ANIMATION_BLOCK = "block";
	public const ANIMATION_CAMERA = "camera";
	public const ANIMATION_CROSSBOW = "crossbow";
	public const ANIMATION_NONE = "none";
	public const ANIMATION_BRUSH = "brush";
	public const ANIMATION_SPEAR = "spear";
	public const ANIMATION_SPYGLASS = "spyglass";

	private string $value;

	/**
	 * Determines which animation plays when using an item.
	 * @param string $value
	 */
	public function __construct(string $value = self::ANIMATION_NONE) {
		$this->value = $value;
	}

	public function getName(): string {
		return "use_animation";
	}

	public function getValue(): string {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}