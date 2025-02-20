<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class WearableComponent implements ItemComponent {

	private string $slot;
	private int $protection;

	/**
	 * Sets the wearable item component.
	 * if added without the protection param the item will be only wearable & will provide no protection.
	 * @param string $slot Specifies where the item can be worn
	 * @param int $protection How much protection the wearable item provides
	 * @throws \InvalidArgumentException if `$protection` is below `0`.
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