<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\animation\Animation;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AnimateEntityPacket;

class CustomAnimationEntity implements Animation{

	private string $animationName;
	private string $nextState;
	private string $stopExpression;
	private int $stopExpressionVersion;
	private string $controller;
	private float $blendOutTime;
	private Entity $entity;

	public function __construct(
		string $animationName,
		Entity $entity,
		string $nextState = "",
		string $stopExpression = "",
		int $stopExpressionVersion = 0,
		string $controller = "",
		float $blendOutTime = 0.1
		){
		$this->animationName = $animationName;
		$this->nextState = $nextState;
		$this->stopExpression = $stopExpression;
		$this->stopExpressionVersion = $stopExpressionVersion;
		$this->controller = $controller;
		$this->blendOutTime = $blendOutTime;
		$this->entity = $entity;
	}

	public function getEntity(): ?Entity{
		return $this->entity;
	}

	public function encode(): array{
		return [AnimateEntityPacket::create(
			$this->animationName,
			$this->nextState,
			$this->stopExpression,
			$this->stopExpressionVersion,
			$this->controller,
			$this->blendOutTime,
			[$this->entity->getId()]
		)];
	}
}