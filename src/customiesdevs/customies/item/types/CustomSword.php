<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\types;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\{
    component\DurabilityComponent,
    component\property\AllowOffHandComponent,
    component\property\DamageComponent,
    component\property\EnchantableSlotComponent,
    component\property\EnchantableValueComponent,
    component\property\HandEquippedComponent,
    component\property\MaxStackSizeComponent
};
use pocketmine\item\Sword;
use pocketmine\item\Durable;

class CustomSword extends Sword implements ItemComponents{
    use ItemComponentsTrait;

    public bool $offhand = false;

    public function setupComponents(){
        $this->addComponent(new DamageComponent($this->getAttackPoints()));
        if($this instanceof Durable){
            $this->addComponent(new DurabilityComponent($this->getMaxDurability()));
        }
        $this->addComponent(new MaxStackSizeComponent(1));
        $this->addComponent(new HandEquippedComponent(true));
        // $this->addComponent(new EnchantableSlotComponent(EnchantableSlotComponent::SLOT_SWORD));
        // $this->addComponent(new EnchantableValueComponent(EnchantableValueComponent::TOOL_DIAMOND));
        $this->addComponent(new AllowOffHandComponent($this->offhand));
    }

    public function setOffHand(bool $bool = false){
        $this->offhand = $bool;
    }

    public function getMaxStackSize(): int{
        return 1;
    }
}