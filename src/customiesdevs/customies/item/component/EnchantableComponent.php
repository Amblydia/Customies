<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class EnchantableComponent implements ItemComponent {

	public const SLOT_ALL = "all";

	private string $slot;
    private int $value;

	/**
	 * Determines what enchantments can be applied to the item. Not all enchantments will have an effect on all item components.
	 * @param string $slot
	 * @param int $value
	 */
	public function __construct(string $slot = self::SLOT_ALL, int $value = 0) {
		$this->slot = $slot;
        $this->value = $value;
	}

	public function getName(): string {
		return "minecraft:enchantable";
	}

	public function getValue(): array {
		return [
            "slot" => $this->slot,
            "value" => $this->value 
        ];
	}

	public function getEnchantableSlot() : string {
		return $this->slot;
	}

	public function getEnchantableValue() : int {
		return $this->value;
	}

	public function isProperty(): bool {
		return false;
	}
}