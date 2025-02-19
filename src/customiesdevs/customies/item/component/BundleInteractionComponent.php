<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class BundleInteractionComponent implements ItemComponent {

	private int $slots;

	/**
	 * Enables the bundle interface and functionality on the item.
	 * @param int $slots
	 * @throws \InvalidArgumentException if `$slots` variable is out of bounds (1 to 64).
	 */
	public function __construct(int $slots) {
		if($slots < 1 || $slots > 64 && !is_int($slots)){
			throw new \InvalidArgumentException("slots variable must be between 1 or 64");
		}
		$this->slots = $slots;
	}

	public function getName(): string {
		return "minecraft:bundle_interaction";
	}

	public function getValue(): array {
		return [
			"num_viewable_slots" => $this->slots
		];
	}

	public function isProperty(): bool {
		return false;
	}
}