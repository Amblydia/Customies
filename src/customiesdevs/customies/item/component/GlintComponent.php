<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class GlintComponent implements ItemComponent {

	private bool $glint;

	public function __construct(bool $glint) {
		$this->glint = $glint;
	}

	public function getName(): string {
		return "glint";
	}

	public function getValue(): bool {
		return $this->glint;
	}

	public function isProperty(): bool {
		return true;
	}
}