<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class GlintComponent implements ItemComponent {

	private bool $glint;

	public function __construct(bool $glint = false) {
		$this->glint = $glint;
	}

	public function getName(): string {
		return "minecraft:glint";
	}

	public function getValue(): array {
		return ["value" => $this->glint];
	}

	public function isProperty(): bool {
		return false;
	}
}