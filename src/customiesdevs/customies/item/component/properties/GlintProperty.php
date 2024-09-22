<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class GlintProperty implements ItemComponent {

	private bool $value;

	/**
	 * Determines whether the item has the enchanted glint render effect on it.
	 * @param bool $value Default is set to `true`
	 * @throws \InvalidArgumentException if `$value` is not a boolean.
	 */
	public function __construct(bool $value = true) {
		if(!is_bool($value)){
			throw new \InvalidArgumentException("A boolean value (true or false) must be specified for 'value'");
		}
		$this->value = $value;
	}

	public function getName(): string {
		return "foil";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}