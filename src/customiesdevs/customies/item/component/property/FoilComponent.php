<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class FoilComponent implements ItemComponent {

	private bool $amount;

	public function __construct(bool $amount) {
		$this->amount = $amount;
	}

	public function getName(): string {
		return "foil";
	}

	public function getValue(): bool {
		return $this->amount;
	}

	public function isProperty(): bool {
		return true;
	}
}