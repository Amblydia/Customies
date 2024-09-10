<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class AnimatesInToolbarComponent implements ItemComponent {

	private bool $animates;

	public function __construct(bool $animates) {
		$this->animates = $animates;
	}

	public function getName(): string {
		return "animates_in_toolbar";
	}

	public function getValue(): bool {
		return $this->animates;
	}

	public function isProperty(): bool {
		return true;
	}
}