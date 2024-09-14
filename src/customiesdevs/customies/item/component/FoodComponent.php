<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class FoodComponent implements ItemComponent {

	public const CHORUS_COOLDOWN = "chorusfruit";

	private bool $canAlwaysEat;
	private int $cooldownTime;
	private string $cooldownType;
	private int $nutrition;
	private float $saturationModifier;
	private string $usingConvertsTo;

	public function __construct(bool $canAlwaysEat = false, int $cooldownTime = 0, string $cooldownType = "", int $nutrition = 0, float $saturationModifier = 0.6, string $usingConvertsTo = "") {
		$this->canAlwaysEat = $canAlwaysEat;
		$this->cooldownTime = $cooldownTime;
		$this->cooldownType = $cooldownType;
		$this->nutrition = $nutrition;
		$this->saturationModifier = $saturationModifier;
		$this->usingConvertsTo = $usingConvertsTo;
	}

	public function getName(): string {
		return "minecraft:food";
	}

	public function getValue(): array {
		return [
			"can_always_eat" => $this->canAlwaysEat,
			"cooldown_time" => $this->cooldownTime,
			"cooldown_type" => $this->cooldownType,
			"nutrition" => $this->nutrition,
			"saturation_modifier" => $this->saturationModifier,
			"using_converts_to" => $this->usingConvertsTo
		];
	}

	public function isProperty(): bool {
		return false;
	}
}