<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class UseDurationProperty implements ItemComponent {

	private int $value;

	/**
	 * How long the item takes to use in seconds.
	 * @param int $value
	 */
	public function __construct(int $value) {
		$this->value = $value;
	}

	public function getName(): string {
		return "use_duration";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}