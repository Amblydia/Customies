<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class ExplodableComponent implements ItemComponent {

	private bool $explode;

	public function __construct(bool $explode) {
		$this->explode = $explode;
	}

	public function getName(): string {
		return "explodable";
	}

	public function getValue(): bool {
		return $this->explode;
	}

	public function isProperty(): bool {
		return true;
	}
}