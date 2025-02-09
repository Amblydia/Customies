<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class UseDurationComponent implements ItemComponent {

	private int $value;

	/**
	 * How long the item takes to use in seconds.
	 * @param int|float $value seconds (`1.6` means `32` seconds)
	 */
	public function __construct(int|float $value = 32) {
		$this->value = $value;
	}

	public function getName(): string {
		return "use_duration";
	}

	public function getValue(): int|float {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}