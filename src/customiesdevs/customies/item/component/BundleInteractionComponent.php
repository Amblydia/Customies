<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class BundleInteractionComponent implements ItemComponent {

	private int $num_viewable_slots;

	public function __construct(
		int $num_viewable_slots = 12
	) {
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