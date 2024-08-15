<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class StackedByDataComponent implements ItemComponent {

	private bool $stackedByData;

	public function __construct(bool $stackedByData) {
		$this->stackedByData = $stackedByData;
	}

	public function getName(): string {
		return "stacked_by_data";
	}

	public function getValue(): bool {
		return $this->stackedByData;
	}

	public function isProperty(): bool {
		return true;
	}
}