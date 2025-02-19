<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\extra;

use customiesdevs\customies\item\component\ItemComponent;

final class FrameCountComponent implements ItemComponent {

	private int $value;

	/**
	 * Mojang's Unknown Property.
	 * @param int $value Default is set to `1` **(Vanilla)**
	 * @todo Figure out what it does
	 */
	public function __construct(int $value = 1) {
		$this->value = $value;
	}

	public function getName(): string {
		return "frame_count";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}