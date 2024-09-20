<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class EntityPlacerComponent implements ItemComponent {

	private string $entity;
	private array $dispenseOn;
    private array $useOn;

	/**
	 * Allows an item to place entities into the world.
	 * @param string $entity
	 * @param array $dispenseOn
	 * @param array $useOn
	 */
	public function __construct(string $entity, array $dispenseOn, array $useOn) {
		$this->entity = $entity;
        $this->dispenseOn = $dispenseOn;
        $this->useOn = $useOn;
	}

	public function getName(): string {
		return "minecraft:entity_placer";
	}

	public function getValue(): array {
		return [
			"entity" => $this->entity,
			"dispense_on" => $this->dispenseOn,
            "use_on" => $this->useOn
		];
	}

	public function isProperty(): bool {
		return false;
	}
}