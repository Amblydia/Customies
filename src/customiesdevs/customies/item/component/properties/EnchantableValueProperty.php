<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class EnchantableValueProperty implements ItemComponent {

	public const ARMOR_LEATHER = 15;
	public const ARMOR_CHAIN = 12;
	public const ARMOR_IRON = 9;
	public const ARMOR_GOLD = 25;
	public const ARMOR_DIAMOND = 10;
	public const ARMOR_TURTLE = 9;
	public const ARMOR_NETHERITE = 15;
	public const ARMOR_OTHER = 1;

	public const TOOL_WOOD = 15;
	public const TOOL_STONE = 5;
	public const TOOL_IRON = 14;
	public const TOOL_GOLD = 22;
	public const TOOL_DIAMOND = 10;
	public const TOOL_NETHERITE = 15;
	public const TOOL_OTHER = 1;

	private int $value;

	/**
	 * The value of the enchantment (minimum of 0).
	 * @param int $value
	 */
	public function __construct(int $value = 0) {
		$this->value = $value;
	}

	public function getName(): string {
		return "enchantable_value";
	}

	public function getValue(): int {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}