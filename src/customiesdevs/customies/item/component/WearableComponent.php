<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class WearableComponent implements ItemComponent {

	public const SLOT_ARMOR_HEAD = "slot.armor.head"; // Helmet
	public const SLOT_ARMOR_CHEST = "slot.armor.chest"; // Chestplate
	public const SLOT_ARMOR_LEGS = "slot.armor.legs"; // Leggings
	public const SLOT_ARMOR_FEET = "slot.armor.feet"; // Boots
	public const SLOT_WEAPON_OFF_HAND = "slot.weapon.offhand"; // Offhand
	// an extra armor slot for entities, like horses,
	// limited to a single armor item but needing the effects of a full armor set
	public const SLOT_EXTRA = "slot.armor.body";

	private string $slot;
	private int $protection;

	/**
	 * Sets the wearable item component.
	 * @param string $slot Specifies where the item can be worn
	 * @param int $protection How much protection the wearable item provides
	 * @throws \InvalidArgumentException if `$protection` is below 0.
	 */
	public function __construct(string $slot, int $protection = 0) {
		if($protection < 0){
			throw new \InvalidArgumentException("protection must be above or equal of 0");
		}
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