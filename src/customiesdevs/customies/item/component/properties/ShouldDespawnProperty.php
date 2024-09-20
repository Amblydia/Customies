<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class ShouldDespawnProperty implements ItemComponent {

	private bool $value;

	/**
	 * Determines if an item should despawn while floating in the world.
	 * @param bool $value
	 */
	public function __construct(bool $value = true) {
		$this->value = $value;
	}

	public function getName(): string {
		return "should_despawn";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}