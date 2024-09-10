<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class MirroredArtComponent implements ItemComponent {

	private bool $mirrored;

	public function __construct(bool $mirrored) {
		$this->mirrored = $mirrored;
	}

	public function getName(): string {
		return "mirrored_art";
	}

	public function getValue(): bool {
		return $this->mirrored;
	}

	public function isProperty(): bool {
		return true;
	}
}