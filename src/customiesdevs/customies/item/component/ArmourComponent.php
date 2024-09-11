<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class ArmourComponent implements ItemComponent {

	private int $protection;

	public function __construct(int $protection) {
		$this->protection = $protection;
	}

	public function getName(): string {
		return "minecraft:armour";
	}

	public function getValue(): array {
		return [
			"protection" => $this->protection
		];
	}

	public function isProperty(): bool {
		return false;
	}
}