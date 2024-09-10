<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\property;

use customiesdevs\customies\item\component\ItemComponent;

final class IgnoresPermissionsComponent implements ItemComponent {

	private bool $ignore;

	public function __construct(bool $ignore) {
		$this->ignore = $ignore;
	}

	public function getName(): string {
		return "ignores_permissions";
	}

	public function getValue(): bool {
		return $this->ignore;
	}

	public function isProperty(): bool {
		return true;
	}
}