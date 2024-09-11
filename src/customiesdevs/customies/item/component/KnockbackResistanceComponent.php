<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class KnockbackResistanceComponent implements ItemComponent {

	private int $protection;

	public function __construct(int $protection) {
		$this->protection = $protection;
	}

	public function getName(): string {
		return "minecraft:knockback_resistance";
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