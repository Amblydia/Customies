<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

class CraftingTableComponent implements BlockComponent {

	private string $tableName;
	private array $craftingTags = [];
	private int $gridSize;

	/**
	 * Makes your block into a custom crafting table which enables the crafting table UI and the ability to craft recipes.
	 * @param string $tableName Specifies the language file key that maps to what text will be displayed in the UI of this table. If the string given can not be resolved as a loc string, the raw string given will be displayed. If this field is omitted, the name displayed will default to the name specified in the "display_name" component. If this block has no "display_name" component, the name displayed will default to the name of the block.
	 * @param int $gridSize Grid Size for the Table
	 * @param array $craftingTags Defines the tags recipes should define to be crafted on this table. Limited to 64 tags. Each tag is limited to 64 characters.
	 */
	public function __construct(string $tableName, int $gridSize = 3, array $craftingTags = ["crafting_table"]) {
		$this->tableName = $tableName;
		$this->gridSize = $gridSize;
		$this->craftingTags = $craftingTags;
	}

	public function getName(): string {
		return "minecraft:crafting_table";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setString("table_name", $this->tableName)
			->setInt("grid_size", $this->gridSize)
			->setTag("crafting_tags", new ListTag($this->craftingTags));
	}
}