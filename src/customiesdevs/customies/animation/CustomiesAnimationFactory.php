<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\Entity;
use pocketmine\player\Player;
use customiesdevs\customies\animation\CustomAnimationEntity;
use customiesdevs\customies\animation\CustomAnimationPlayer;

class CustomiesAnimationFactory{

    public function animatePlayer(Player $player, string $animationName): void{
        $player->broadcastAnimation(new CustomAnimationPlayer($animationName, $player));
    }

    public function animateEntity(Entity $entity, string $animationName): void{
        $entity->broadcastAnimation(new CustomAnimationEntity($animationName, $entity));
    }
}