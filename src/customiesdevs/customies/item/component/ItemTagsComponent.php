<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class ItemTagsComponent implements ItemComponent {

	# Tools
	public const TAG_IS_SWORD = "minecraft:is_sword";
	public const TAG_IS_TOOL = "minecraft:is_tool";
	public const TAG_IS_ARMOR = "minecraft:is_armor";
	public const TAG_IS_AXE = "minecraft:is_axe";
	public const TAG_IS_HOE = "minecraft:is_hoe";
	public const TAG_IS_PICKAXE = "minecraft:is_pickaxe";
	public const TAG_IS_SHOVEL = "minecraft:is_shovel";
	public const TAG_IS_TRIDENT = "minecraft:is_trident";
	# Pickaxe
	public const TAG_DIGGER = "minecraft:digger";
	# Food
	public const TAG_IS_COOKED = "minecraft:is_cooked";
	public const TAG_IS_MEAT = "minecraft:is_meat";
	public const TAG_IS_FOOD = "minecraft:is_food";
	public const TAG_IS_FISH = "minecraft:is_fish";
	# Tiers
	public const TAG_LEATHERTIER = "minecraft:leather_tier";
	public const TAG_WOOD_TIER = "minecraft:wooden_tier";
	public const TAG_STONE_TIER = "minecraft:stone_tier";
	public const TAG_GOLD_TIER = "minecraft:golden_tier";
	public const TAG_IRON_TIER = "minecraft:iron_tier";
	public const TAG_DIAMOND_TIER = "minecraft:diamond_tier";
	public const TAG_NETHERITE_TIER = "minecraft:netherite_tier";
	# Trims
	public const TAG_UPGRADE_TEMPLATE = "minecraft:transform_templates";
	public const TAG_TRIM_TEMPLATES = "minecraft:trim_templates";
	public const TAG_TRIMMABLE = "minecraft:trimmable_armors"; // makes templates work on armors
	# Other
	public const TAG_ARROW = "minecraft:arrow";
	public const TAG_BANNER = "minecraft:banner";
	public const TAG_BOAT = "minecraft:boat";
	public const TAG_LOGS = "minecraft:logs";
	public const TAG_DISC = "minecraft:music_disc";
	public const TAG_PLANKS = "minecraft:planks";
	public const TAG_SPAWNEGG = "minecraft:spawn_egg";
	public const TAG_DAMPERS = "minecraft:vibration_damper";
	public const TAG_WOOL = "minecraft:wool";

	private array $tags = [];

	/**
	 * Determines which items tags are included on a given item.
	 * @param array $tags An array that can contain multiple item tags
	 * @link [ItemTags](https://wiki.bedrock.dev/items/item-tags.html)
	 */
	public function __construct(array $tags) {
		$this->tags = $tags;
	}

	public function getName(): string {
		return "item_tags";
	}

	public function getValue(): array {
		return $this->tags;
	}

	public function isProperty(): bool {
		return false;
	}
}