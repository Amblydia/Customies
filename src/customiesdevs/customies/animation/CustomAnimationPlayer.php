<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\animation\Animation;
use pocketmine\player\Player;
use pocketmine\network\mcpe\protocol\AnimateEntityPacket;

class CustomAnimationPlayer implements Animation{

	private string $animationName;
	private Player $player;

	public function __construct(string $animationName, Player $player){
		$this->animationName = $animationName;
		$this->player = $player;
	} 

	public function encode() : array{
		return [AnimateEntityPacket::create(
			$this->animationName,
			"",
			"",
			0,
			"",
			0.0,
			[$this->player->getId()]
		)];
	}
}