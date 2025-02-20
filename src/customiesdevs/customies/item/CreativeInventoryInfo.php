<?php

namespace customiesdevs\customies\item;

final class CreativeInventoryInfo {

	const CATEGORY_ALL = "all";
	const CATEGORY_COMMANDS = "commands";
	const CATEGORY_CONSTRUCTION = "construction";
	const CATEGORY_EQUIPMENT = "equipment";
	const CATEGORY_ITEMS = "items";
	const CATEGORY_NATURE = "nature";

	const NONE = "none";
	const GROUP_ANVIL = "minecraft:itemGroup.name.anvil";
	const GROUP_ARROW = "minecraft:itemGroup.name.arrow";
	const GROUP_AXE = "minecraft:itemGroup.name.axe";
	const GROUP_BANNER = "minecraft:itemGroup.name.banner";
	const GROUP_BANNER_PATTERN = "minecraft:itemGroup.name.banner_pattern";
	const GROUP_BED = "minecraft:itemGroup.name.bed";
	const GROUP_BOAT = "minecraft:itemGroup.name.boat";
	const GROUP_BOOTS = "minecraft:itemGroup.name.boots";
	const GROUP_BUTTONS = "minecraft:itemGroup.name.buttons";
	const GROUP_CHALKBOARD = "minecraft:itemGroup.name.chalkboard";
	const GROUP_CHEST = "minecraft:itemGroup.name.chest";
	const GROUP_CHESTPLATE = "minecraft:itemGroup.name.chestplate";
	const GROUP_CONCRETE = "minecraft:itemGroup.name.concrete";
	const GROUP_CONCRETE_POWDER = "minecraft:itemGroup.name.concretePowder";
	const GROUP_COOKED_FOOD = "minecraft:itemGroup.name.cookedFood";
	const GROUP_COOPPER = "minecraft:itemGroup.name.copper";
	const GROUP_CORAL = "minecraft:itemGroup.name.coral";
	const GROUP_CORAL_DECORATIONS = "minecraft:itemGroup.name.coral_decorations";
	const GROUP_CROP = "minecraft:itemGroup.name.crop";
	const GROUP_DOOR = "minecraft:itemGroup.name.door";
	const GROUP_DYE = "minecraft:itemGroup.name.dye";
	const GROUP_ENCHANTED_BOOK = "minecraft:itemGroup.name.enchantedBook";
	const GROUP_FENCE = "minecraft:itemGroup.name.fence";
	const GROUP_FENCE_GATE = "minecraft:itemGroup.name.fenceGate";
	const GROUP_FIREWORK = "minecraft:itemGroup.name.firework";
	const GROUP_FIREWORK_STARS = "minecraft:itemGroup.name.fireworkStars";
	const GROUP_FLOWER = "minecraft:itemGroup.name.flower";
	const GROUP_GLASS = "minecraft:itemGroup.name.glass";
	const GROUP_GLASS_PANE = "minecraft:itemGroup.name.glassPane";
	const GROUP_GLAZED_TERRACOTTA = "minecraft:itemGroup.name.glazedTerracotta";
	const GROUP_GRASS = "minecraft:itemGroup.name.grass";
	const GROUP_HELMET = "minecraft:itemGroup.name.helmet";
	const GROUP_HOE = "minecraft:itemGroup.name.hoe";
	const GROUP_HORSE_ARMOR = "minecraft:itemGroup.name.horseArmor";
	const GROUP_LEAVES = "minecraft:itemGroup.name.leaves";
	const GROUP_LEGGINGS = "minecraft:itemGroup.name.leggings";
	const GROUP_LINGERING_POTION = "minecraft:itemGroup.name.lingeringPotion";
	const GROUP_LOG = "minecraft:itemGroup.name.log";
	const GROUP_MINECRAFT = "minecraft:itemGroup.name.minecart";
	const GROUP_MISC_FOOD = "minecraft:itemGroup.name.miscFood";
	const GROUP_MOB_EGGS = "minecraft:itemGroup.name.mobEgg";
	const GROUP_MONSTER_STONE_EGG = "minecraft:itemGroup.name.monsterStoneEgg";
	const GROUP_MUSHROOM = "minecraft:itemGroup.name.mushroom";
	const GROUP_NETHERWART_BLOCK = "minecraft:itemGroup.name.netherWartBlock";
	const GROUP_ORE = "minecraft:itemGroup.name.ore";
	const GROUP_PERMISSION = "minecraft:itemGroup.name.permission";
	const GROUP_PICKAXE = "minecraft:itemGroup.name.pickaxe";
	const GROUP_PLANKS = "minecraft:itemGroup.name.planks";
	const GROUP_POTION = "minecraft:itemGroup.name.potion";
	const GROUP_PRESSURE_PLATE = "minecraft:itemGroup.name.pressurePlate";
	const GROUP_RAIL = "minecraft:itemGroup.name.rail";
	const GROUP_RAW_FOOD = "minecraft:itemGroup.name.rawFood";
	const GROUP_RECORD = "minecraft:itemGroup.name.record";
	const GROUP_SANDSTONE = "minecraft:itemGroup.name.sandstone";
	const GROUP_SAPLING = "minecraft:itemGroup.name.sapling";
	const GROUP_SEED = "minecraft:itemGroup.name.seed";
	const GROUP_SHOVEL = "minecraft:itemGroup.name.shovel";
	const GROUP_SHULKER_BOX = "minecraft:itemGroup.name.shulkerBox";
	const GROUP_SIGN = "minecraft:itemGroup.name.sign";
	const GROUP_SKULL = "minecraft:itemGroup.name.skull";
	const GROUP_SLAB = "minecraft:itemGroup.name.slab";
	const GROUP_SLASH_POTION = "minecraft:itemGroup.name.splashPotion";
	const GROUP_STAINED_CLAY = "minecraft:itemGroup.name.stainedClay";
	const GROUP_STAIRS = "minecraft:itemGroup.name.stairs";
	const GROUP_STONE = "minecraft:itemGroup.name.stone";
	const GROUP_STONE_BRICK = "minecraft:itemGroup.name.stoneBrick";
	const GROUP_SWORD = "minecraft:itemGroup.name.sword";
	const GROUP_TRAPDOOR = "minecraft:itemGroup.name.trapdoor";
	const GROUP_WALLS = "minecraft:itemGroup.name.walls";
	const GROUP_WOOD = "minecraft:itemGroup.name.wood";
	const GROUP_WOOL = "minecraft:itemGroup.name.wool";
	const GROUP_WOOL_CARPET = "minecraft:itemGroup.name.woolCarpet";
	const GROUP_CANDLES = "minecraft:itemGroup.name.candles";
	const GROUP_GOAT_HORN = "minecraft:itemGroup.name.goatHorn";

	/**
	 * Returns a default type which puts the item in to the all category and no sub group.
	 */
	public static function DEFAULT(): self {
		return new self(self::CATEGORY_ALL, self::NONE);
	}

	public function __construct(private readonly string $category = self::NONE, private readonly string $group = self::NONE) { }

	/**
	 * Returns the category the item is part of.
	 */
	public function getCategory(): string {
		return $this->category;
	}

	/**
	 * Returns the numeric representation of the category the item is part of.
	 * @return int Default is set to `1`
	 */
	public function getNumericCategory(): int {
		return match ($this->getCategory()) {
			self::CATEGORY_CONSTRUCTION => 1,
			self::CATEGORY_NATURE => 2,
			self::CATEGORY_EQUIPMENT => 3,
			self::CATEGORY_ITEMS => 4,
			default => 1
		};
	}

	/**
	 * Returns the group the item is part of, if any.
	 */
	public function getGroup(): string {
		return $this->group;
	}
}
