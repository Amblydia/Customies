<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use pocketmine\item\ItemCooldownTags;

final class CooldownComponent implements ItemComponent {

	public const CATEGORY_SHIELD = "minecraft:shield";
	public const CATEGORY_PEARL = "minecraft:ender_pearl";
	public const CATEGORY_HORN = "minecraft:goat_horn";
	public const CATEGORY_WINDCHARGE = "minecraft:wind_charge";
	public const CATEGORY_CHORUS = "minecraft:chorusfruit";

	private string $category;
	private float $duration;

	/**
	 * Sets an item's "Cooldown" time. 
	 * After using an item, it becomes unusable for the duration specified by the `duration` setting of this component.
	 * @param string $category The type of cool down for this item. All items with a cool down component with the same category are put on cool down when one is used
	 * @param float $duration The duration of time (in seconds) items with a matching category will spend cooling down before becoming usable again
	 * @throws \InvalidArgumentException if `$duration` variable is below 0.
	 */
	public function __construct(string $category, float $duration) {
		if(!is_float($duration) && $duration < 0){
			throw new \InvalidArgumentException("the duration of the cooldown should be above or equal of 0");
		}
		$this->category = $category;
		$this->duration = $duration;
	}

	public function getName(): string {
		return "minecraft:cooldown";
	}

	public function getValue(): array {
		return [
			"category" => $this->category,
			"duration" => $this->duration
		];
	}

	public function isProperty(): bool {
		return false;
	}
}