<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class DyeableComponent implements ItemComponent {

	private string $hex;

	/**
	 * Enables custom items to be dyed in cauldrons.
	 * @param string $hex The hex color code (e.g `#47ff5a`)
	 */
	public function __construct(string $hex) {
		$this->hex = $hex;
	}

	public function getName(): string {
		return "minecraft:dyeable";
	}

	public function getValue(): array {
		return [
			"default_color" => $this->hex
		];
	}

	public function isProperty(): bool {
		return false;
	}
}