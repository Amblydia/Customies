<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class FrameCountProperty implements ItemComponent {

	private int $value;

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