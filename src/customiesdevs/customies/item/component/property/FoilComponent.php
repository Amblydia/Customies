<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class FoilComponent implements ItemComponent {

	private bool $foiled;

	public function __construct(bool $foiled = false) {
		$this->foiled = $foiled;
	}

	public function getName(): string {
		return "foil";
	}

	public function getValue(): bool {
		return $this->foiled;
	}

	public function isProperty(): bool {
		return true;
	}
}