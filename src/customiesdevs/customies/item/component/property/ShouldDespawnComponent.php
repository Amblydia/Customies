<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class ShouldDespawnComponent implements ItemComponent {

	private bool $shouldDespawn;

	public function __construct(bool $shouldDespawn) {
		$this->shouldDespawn = $shouldDespawn;
	}

	public function getName(): string {
		return "should_despawn";
	}

	public function getValue(): bool {
		return $this->shouldDespawn;
	}

	public function isProperty(): bool {
		return true;
	}
}