<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DyeableComponent implements ItemComponent {

	private array $hexCode;

	/**
	 * Enables custom items to be dyed in cauldrons.
	 * @param array $hexCode
	 */
	public function __construct(array $hexCode) { // convert this #47ff5a to int [71, 255, 90]
		$this->hexCode = $hexCode;
	}

	public function getName(): string {
		return "minecraft:dyeable";
	}

	public function getValue(): array {
		return [
            "default_color" => [$this->hexCode]
        ];
	}

	public function isProperty(): bool {
		return false;
	}
}