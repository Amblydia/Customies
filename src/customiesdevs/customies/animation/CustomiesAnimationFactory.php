<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\Entity;
use pocketmine\player\Player;
use customiesdevs\customies\animation\CustomAnimationEntity;
use customiesdevs\customies\animation\CustomAnimationPlayer;

class CustomiesAnimationFactory{

	public function animatePlayer(
		Player $player,
		string $animationName,
		string $nextState = "",
		string $stopExpression = "",
		int $stopExpressionVersion = 0,
		string $controller = "",
		float $blendOutTime = 0.1
	): void{
		$player->broadcastAnimation(new CustomAnimationPlayer($animationName, $player, $nextState, $stopExpression, $stopExpressionVersion, $controller, $blendOutTime));
	}

	public function animateEntity(
		Entity $entity,
		string $animationName,
		string $nextState = "",
		string $stopExpression = "",
		int $stopExpressionVersion = 0,
		string $controller = "",
		float $blendOutTime = 0.1
	): void{
		$entity->broadcastAnimation(new CustomAnimationEntity($animationName, $entity, $nextState, $stopExpression, $stopExpressionVersion, $controller, $blendOutTime));
	}
}