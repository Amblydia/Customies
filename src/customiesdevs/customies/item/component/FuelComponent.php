<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class FuelComponent implements ItemComponent {

	private float $duration;

	/**
	 * Allows this item to be used as fuel in a furnace to 'cook' other items.
	 * @param float $duration Amount of time, in seconds, this fuel will cook items
	 * @throws \InvalidArgumentException if `$duration` is below `0.05`
	 */
	public function __construct(float $duration = 0.05) {
		if($duration <  0.05){
			throw new \InvalidArgumentException("duration value must be above 0.05");
		}
		$this->duration = $duration;
	}

	public function getName(): string {
		return "minecraft:fuel";
	}

	public function getValue(): array {
		return [
			"duration" => $this->duration
		];
	}

	public function isProperty(): bool {
		return false;
	}
}