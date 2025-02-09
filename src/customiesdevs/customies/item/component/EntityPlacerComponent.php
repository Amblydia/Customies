<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class EntityPlacerComponent implements ItemComponent {

	private string $entity;
<<<<<<< Updated upstream
	private array $dispense_on;
    private array $use_on;
=======
	private array $dispenseOn = [];
	private array $useOn = [];
>>>>>>> Stashed changes

	public function __construct(string $entity, array $dispense_on, array $use_on) {
		$this->entity = $entity;
        $this->dispense_on = $dispense_on;
        $this->use_on = $use_on;
	}

	public function getName(): string {
		return "minecraft:entity_placer";
	}

	public function getValue(): array {
		return [
			"entity" => $this->entity,
			"dispense_on" => $this->dispense_on,
            "use_on" => $this->use_on
		];
	}

	public function isProperty(): bool {
		return false;
	}
}