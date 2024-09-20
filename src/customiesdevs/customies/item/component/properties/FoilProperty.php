<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class FoilProperty implements ItemComponent {

	private bool $value;

	/**
	 * Determines whether the item has the enchanted glint render effect on it.
	 * @param bool $value
	 */
	public function __construct(bool $value = false) {
		$this->value = $value;
	}

	public function getName(): string {
		return "foil";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}