<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use InvalidArgumentException;

final class RecordComponent implements ItemComponent {

	private int $comparatorSignal;
	private float $duration;
    private string $soundEvent;

	/**
	 * Record Component used by record items to play music.
	 * @param int $comparatorSignal Specifies signal strength for comparator blocks to use, from 1 - 13
	 * @param float $duration Specifies duration of sound event in seconds, float value
	 * @param string $soundEvent Sound event type: 13, cat, blocks, chirp, far, mall, mellohi, stal, strad, ward, 11, wait, pigstep, otherside, 5, relic
	 * @throws \InvalidArgumentException if $comparatorSignal is out of bounds (1 to 13).
	 */
	public function __construct(int $comparatorSignal = 1, float $duration, string $soundEvent = "undefined") {
		if($comparatorSignal < 1 || $comparatorSignal > 13){
			throw new InvalidArgumentException("comparatorSignal must be between 1 or 13");
		}
		$this->comparatorSignal = $comparatorSignal;
		$this->duration = $duration;
        $this->soundEvent = $soundEvent;
	}

	public function getName(): string {
		return "minecraft:record";
	}

	public function getValue(): array {
		return [
			"comparator_signal" => $this->comparatorSignal,
			"duration" => $this->duration,
            "sound_event" => $this->soundEvent
		];
	}

	public function isProperty(): bool {
		return false;
	}
}