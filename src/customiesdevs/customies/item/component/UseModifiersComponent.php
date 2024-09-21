<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class UseModifiersComponent implements ItemComponent {

	private float $useDuration;
	private float $movementModifier;

	/**
	 * Determines how long an item takes to use in combination with components such as Shooter, Throwable, or Food.
	 * @param float $useDuration
	 * @param float $movementModifier
	 */
	public function __construct(float $movementModifier, float $useDuration = 0) {
		$this->useDuration = $useDuration;
		$this->movementModifier = $movementModifier;
	}

	public function getName(): string {
		return "minecraft:use_modifiers";
	}

	public function getValue(): array {
		return [
			"movement_modifier" => $this->movementModifier,
			"use_duration" => $this->useDuration
		];
	}

	public function getUseDuration(): float {
		return $this->useDuration;
	}

	public function isProperty(): bool {
		return false;
	}
}