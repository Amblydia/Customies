<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\unknown_properties;

use customiesdevs\customies\item\component\ItemComponent;

final class MiningSpeedComponent implements ItemComponent {

	private float $value;

	/**
	 * Mojang's Unknown Property.
	 * @param float $value Default is set to `1` **(Vanilla)**
	 * @todo Figure out what it does
	 */
	public function __construct(float $value = 1) {
		$this->value = $value;
	}

	public function getName(): string {
		return "mining_speed";
	}

	public function getValue(): float {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}