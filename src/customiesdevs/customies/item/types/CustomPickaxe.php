<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\types;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\{
    component\DiggerComponent,
    component\DurabilityComponent,
    component\GlintComponent,
    component\UseModifiersComponent,
    component\TagsComponent,
    component\RepairableComponent,
    component\property\AllowOffHandComponent,
    component\property\CanDestroyInCreativeComponent,
    component\property\DamageComponent,
    component\property\EnchantableSlotComponent,
    component\property\EnchantableValueComponent,
    component\property\HandEquippedComponent,
    component\property\FoilComponent,
    component\property\IconComponent,
    component\property\MiningSpeedComponent,
    component\property\UseAnimationComponent,
    component\property\UseDurationComponent,
    component\property\MaxStackSizeComponent
};
use pocketmine\item\ItemIdentifier;
use pocketmine\item\Pickaxe;
use pocketmine\item\ToolTier;
use pocketmine\item\Durable;
use pocketmine\item\TieredTool;

class CustomPickaxe extends Pickaxe implements ItemComponents{
    use ItemComponentsTrait;
    // todo
}