<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class RequiresInteractComponent implements ItemComponent {

	private bool $interact;

	public function __construct(bool $interact) {
		$this->interact = $interact;
	}

	public function getName(): string {
		return "requires_interact";
	}

	public function getValue(): bool {
		return $this->interact;
	}

	public function isProperty(): bool {
		return true;
	}
}