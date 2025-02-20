<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RarityComponent implements ItemComponent {

	public const RARITY_COMMON = "common";
	public const RARITY_UNCOMMON = "uncommon";
	public const RARITY_RARE = "rare";
	public const RARITY_EPIC = "epic";

	private string $rarity;

	/**
	 * Rarity Component enables the specifying of the base rarity of an item. 
	 * The rarity of the item will determine which color it uses for its name, unless the item has a `HoverTextColor` component specified, in which case that hover text color will take priority and be used instead of the rarity color.
	 * An item's rarity value will be upgraded to `rare` if enchanted, or `epic` if its base rarity is already `rare`. An `epic` rarity item will remain unchanged when enchanted.
	 * @param string $rarity Sets the base rarity of the item. The rarity of an item automatically increases when enchanted, either to `Rare` when the base rarity is `Common` or `Uncommon`, or `Epic` when the base rarity is `Rare`
	 */
	public function __construct(string $rarity = RarityComponent::RARITY_COMMON) {
		$this->rarity = $rarity;
	}

	public function getName(): string {
		return "minecraft:rarity";
	}

	public function getValue(): array {
		return [
			"value" => $this->rarity
		];
	}

	public function isProperty(): bool {
		return false;
	}
}