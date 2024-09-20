<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class WearableComponent implements ItemComponent {

	public const SLOT_ARMOR = "slot.armor";
	public const SLOT_ARMOR_CHEST = "slot.armor.chest";
	public const SLOT_ARMOR_FEET = "slot.armor.feet";
	public const SLOT_ARMOR_HEAD = "slot.armor.head";
	public const SLOT_ARMOR_LEGS = "slot.armor.legs";
	public const SLOT_WEAPON_MAIN_HAND = "slot.weapon.mainhand";
	public const SLOT_WEAPON_OFF_HAND = "slot.weapon.offhand";

	private string $slot;
	private int $protection;

	/**
	 * Sets the wearable item component.
	 * @param string $slot
	 * @param int $protection
	 */
	public function __construct(string $slot, int $protection = 0) {
		$this->slot = $slot;
		$this->protection = $protection;
	}

	public function getName(): string {
		return "minecraft:wearable";
	}

	public function getValue(): array {
		return [
			"slot" => $this->slot,
			"protection" => $this->protection
		];
	}

	public function isProperty(): bool {
		return false;
	}
}