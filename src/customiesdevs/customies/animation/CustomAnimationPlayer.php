<?php
declare(strict_types=1);

namespace customiesdevs\customies\animation;

use pocketmine\entity\animation\Animation;
use pocketmine\player\Player;
use pocketmine\network\mcpe\protocol\AnimateEntityPacket;

class CustomAnimationPlayer implements Animation{

	private string $animationName;
	private string $nextState;
	private string $stopExpression;
	private int $stopExpressionVersion;
	private string $controller;
	private float $blendOutTime;
	private Player $player;

	public function __construct(
		string $animationName,
		Player $player,
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
		$this->player = $player;
	}

	public function getPlayer(): ?Player{
		return $this->player;
	}

	public function encode(): array{
		return [AnimateEntityPacket::create(
			$this->animationName,
			$this->nextState,
			$this->stopExpression,
			$this->stopExpressionVersion,
			$this->controller,
			$this->blendOutTime,
			[$this->player->getId()]
		)];
	}
}