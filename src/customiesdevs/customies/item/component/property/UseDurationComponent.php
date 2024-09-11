<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class UseDurationComponent implements ItemComponent {

	private int $amount;

	public function __construct(int $amount) {
		$this->amount = $amount;
	}

	public function getName(): string {
		return "use_duration";
	}

	public function getValue(): int {
		return $this->amount;
	}

	public function isProperty(): bool {
		return true;
	}
}