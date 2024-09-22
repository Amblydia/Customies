<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\types;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\{
	component\DurabilityComponent
};
use pocketmine\item\Sword;
use pocketmine\item\Durable;

class CustomSword extends Sword implements ItemComponents{
	use ItemComponentsTrait;

	public bool $offhand = false;

	public function setupComponents(){
		if($this instanceof Durable){
			$this->addComponent(new DurabilityComponent($this->getMaxDurability()));
		}
	}

	public function setOffHand(bool $bool = false){
		$this->offhand = $bool;
	}

	public function getMaxStackSize(): int{
		return 1;
	}
}