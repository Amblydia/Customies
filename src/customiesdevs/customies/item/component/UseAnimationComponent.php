<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class UseAnimationComponent implements ItemComponent {

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

	private string $animation;

	public function __construct(string $animation = self::ANIMATION_NONE) {
		$this->animation = $animation;
	}

	public function getName(): string {
		return "minecraft:use_animation";
	}

	public function getValue(): string {
		return $this->animation;
	}

	public function isProperty(): bool {
		return false;
	}
}