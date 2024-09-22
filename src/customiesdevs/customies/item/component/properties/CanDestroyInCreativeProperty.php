<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class CanDestroyInCreativeProperty implements ItemComponent {

	private bool $value;

	/**
	 * Determines if the item will break blocks in Creative Mode while swinging.
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
		return "can_destroy_in_creative";
	}

	public function getValue(): bool {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}