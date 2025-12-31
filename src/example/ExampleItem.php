<?php
declare(strict_types=1);

namespace customiesdevs\customies\example;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\component\DisplayNameComponent;
use customiesdevs\customies\item\component\IconComponent;
use customiesdevs\customies\item\component\MaxStackSizeComponent;
use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;

class ExampleItem extends Item implements ItemComponents {
	use ItemComponentsTrait;

	public function __construct() {
		parent::__construct(new ItemIdentifier(ItemTypeIds::newId()), "Example Item");
		
		// Add components to define item behavior
		$this->addComponent(new DisplayNameComponent("§bSapphire Gem"));
		$this->addComponent(new IconComponent("sapphire"));
		$this->addComponent(new MaxStackSizeComponent(7));
	}
}
