<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\types;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\{
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
    component\property\UseAnimationComponent,
    component\property\UseDurationComponent,
    component\property\MaxStackSizeComponent
};
use pocketmine\item\ItemIdentifier;
use pocketmine\item\Shovel;
use pocketmine\item\ToolTier;
use pocketmine\item\Durable;
use pocketmine\item\TieredTool;

class CustomShovel extends Shovel implements ItemComponents{
    use ItemComponentsTrait;
    // todo
}