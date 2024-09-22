<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class UseAnimationComponent implements ItemComponent {

	public const ANIMATION_NONE = "none";
	public const ANIMATION_EAT = "eat";
	public const ANIMATION_DRINK = "drink";
	public const ANIMATION_BLOCK = "block";
	public const ANIMATION_BOW = "bow";
	public const ANIMATION_CAMERA = "camera";
	public const ANIMATION_SPEAR = "spear";
	public const ANIMATION_CROSSBOW = "crossbow";
	public const ANIMATION_SPYGLASS = "spyglass";
	public const ANIMATION_BRUSH = "brush";

	private string $animation;

	public function __construct(string $animation = self::ANIMATION_EAT) {
		$this->animation = $animation;
	}

	public function getName(): string {
		return "minecraft:use_animation";
	}

	public function getValue(): array {
		return [
			"value" => $this->animation,
		];
	}

	public function isProperty(): bool {
		return false;
	}
}