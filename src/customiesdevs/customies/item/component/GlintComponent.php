<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class GlintComponent implements ItemComponent {

	private bool $value;

	/**
	 * Determines whether the item has the enchanted glint render effect on it.
	 * @param bool $value
	 */
	public function __construct(bool $value = false) {
		$this->value = $value;
	}

	public function getName(): string {
		return "minecraft:glint";
	}

	public function getValue(): array {
		return [
			"value" => $this->value
		];
	}

	public function isProperty(): bool {
		return false;
	}
}