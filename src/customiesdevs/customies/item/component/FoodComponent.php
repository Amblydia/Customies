<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class FoodComponent implements ItemComponent {

	public const CHORUS_COOLDOWN = "chorusfruit";

	private bool $canAlwaysEat;
	private int $nutrition;
	private float $saturationModifier;
	private string $usingConvertsTo;

	/**
	 * Sets the item as a food component, allowing it to be edible to the player.
	 * @param bool $canAlwaysEat If true you can always eat this item (even when not hungry)
	 * @param int $nutrition Value that is added to the entity's nutrition when the item is used
	 * @param float $saturationModifier Saturation Modifier is used in this formula: `(nutrition * saturation_modifier * 2)` when applying the saturation buff.
	 * @param string $usingConvertsTo When used, converts to the item specified by the string in this field. Default does not convert item
	 * @throws \InvalidArgumentException if `$nutrition` is not between `0` & `32`
	 * @throws \InvalidArgumentException if `$saturationModifier` is below `0`
	 */
	public function __construct(bool $canAlwaysEat = false, int $nutrition = 0, float $saturationModifier = 0.6, string $usingConvertsTo = "") {
		if($nutrition < 0 || $nutrition > 32){
			throw new \InvalidArgumentException("nutrition value must be between 0 & 32");
		}
		if($saturationModifier < 0){
			throw new \InvalidArgumentException("saturationModifier value must be above 0");
		}
		$this->canAlwaysEat = $canAlwaysEat;
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
			"nutrition" => $this->nutrition,
			"saturation_modifier" => $this->saturationModifier,
			"using_converts_to" => [
				"name" => $this->usingConvertsTo
			]
		];
	}

	public function isProperty(): bool {
		return false;
	}
}