<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RarityComponent implements ItemComponent {

    public const RARITY_COMMON = "common";
    public const RARITY_UNCOMMON = "uncommon";
    public const RARITY_RARE = "rare";
    public const RARITY_EPIC = "epic";

	private string $type;

	/**
	 * Rarity Component enables the specifying of the base rarity of an item. 
	 * The rarity of the item will determine which color it uses for its name, unless the item has a HoverTextColor component specified, in which case that hover text color will take priority and be used instead of the rarity color.
	 * @param string $type
	 */
	public function __construct(string $type = self::RARITY_COMMON) {
		$this->type = $type;
	}

	public function getName(): string {
		return "minecraft:rarity";
	}

	public function getValue(): array {
		return [
			"value" => $this->type
		];
	}

	public function isProperty(): bool {
		return false;
	}
}