<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DurabilitySensorComponent implements ItemComponent {

	private array $thresholds = [];

	/**
	 * Enables an item to emit effects when it receives damage.
	 * @param array $maxDurability Items define both the durability thresholds, and the effects emitted when each threshold is met.
	 * When multiple thresholds are met, only the threshold with the lowest durability after applying the damage is considered.
	 */
	public function __construct(array $thresholds = []) {
        foreach($thresholds as $threshold) {
            $this->addThreshold($threshold);
        }
    }

	public function getName(): string {
		return "minecraft:durability_sensor";
	}

	public function getValue(): array {
		return [
			"durability_thresholds" => $this->thresholds
		];
	}

	public function isProperty(): bool {
		return false;
	}

	/**
	 * Adds a durability threshold with its corresponding effects.
     * @param array $threshold Associative array containing
	 * 'durability', 'particle_type' *(optional)*, and 'sound_event' *(optional)*
     * @return DurabilitySensorComponent
     */
	public function addThreshold(array $threshold): DurabilitySensorComponent{
		if(!isset($threshold["durability"]) || !is_int($threshold["durability"])){
            throw new \InvalidArgumentException("Durability must be an integer.");
        }
        $entry = ["durability" => $threshold["durability"]];
        if(isset($threshold["particle_type"])){
            $entry["particle_type"] = $threshold["particle_type"];
        }
        if(isset($threshold["sound_event"])){
            $entry["sound_event"] = $threshold["sound_event"];
        }
        $this->thresholds[] = $entry;
		return $this;
	}
}