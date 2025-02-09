<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use InvalidArgumentException;

final class BundleInteractionComponent implements ItemComponent {

	private int $num_viewable_slots;

	/**
	 * Enables the bundle interface and functionality on the item.
	 * @param int $num_viewable_slots
	 * @throws InvalidArgumentException if `$num_viewable_slots` is out of bounds (1 to 64).
	 */
	public function __construct(int $num_viewable_slots = 12) {
		if($num_viewable_slots < 1 || $num_viewable_slots > 64){
			throw new InvalidArgumentException("num_viewable_slots must be between 1 or 64");
		}
		$this->num_viewable_slots = $num_viewable_slots;
	}

	public function getName(): string {
		return "minecraft:bundle_interaction";
	}

	public function getValue(): array {
		return [
			"num_viewable_slots" => $this->num_viewable_slots
		];
	}

	public function isProperty(): bool {
		return false;
	}
}