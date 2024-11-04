<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DamageAbsorptionComponent implements ItemComponent {

    private array $cause;

    /**
     * Causes the item to absorb damage that would otherwise be dealt to its wearer.
     * For this to happen, the item needs to have the durability component and be equipped in an armor slot.
     */
	public function __construct(array $cause) {
        $this->cause = $cause;
	}

	public function getName(): string {
		return "minecraft:damage_absorption";
	}

	public function getValue(): array {
		return [
			"absorbable_causes" => $this->cause
		];
	}

	public function isProperty(): bool {
		return false;
	}
}