<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\animation\Animation;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AnimateEntityPacket;

class CustomAnimationEntity implements Animation{

	private string $animationName;
	private Entity $entity;

	public function __construct(string $animationName, Entity $entity){
		$this->animationName = $animationName;
		$this->entity = $entity;
	} 

	public function encode() : array{
		return [AnimateEntityPacket::create(
			$this->animationName,
			"",
			"",
			0,
			"",
			0.0,
			[$this->entity->getId()]
		)];
	}
}