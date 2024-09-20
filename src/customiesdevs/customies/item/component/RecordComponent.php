<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RecordComponent implements ItemComponent {

	private int $comparatorSignal;
	private float $duration;
    private string $soundEvent;

	/**
	 * Record Component used by record items to play music.
	 * @param int $comparatorSignal
	 * @param float $duration
	 * @param string $soundEvent
	 */
	public function __construct(int $comparatorSignal = 1, float $duration, string $soundEvent = "undefined") {
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