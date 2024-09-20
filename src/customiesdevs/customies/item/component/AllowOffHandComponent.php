<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class AllowOffHandComponent implements ItemComponent {

	private bool $offHand;
	private bool $isProperty;

	public function __construct(bool $offHand = true, bool $isProperty = true) {
		$this->offHand = $offHand;
		$this->isProperty = $isProperty;
	}

	public function getName(): string {
		return match ($this->isProperty) {
			true => "allow_off_hand",
			default => "minecraft:allow_off_hand",
		};
	}

	public function getValue(): bool|array {
		return match ($this->isProperty) {
			true => $this->offHand,
			default => [
				"value" => $this->offHand
			],
		};
	}

	public function isProperty(): bool {
		return $this->isProperty;
	}
}