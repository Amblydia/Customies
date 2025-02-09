<?php
declare(strict_types=1);

namespace customiesdevs\customies\sound;

use customiesdevs\customies\sound\CustomSound;
use pocketmine\player\Player;
use pocketmine\world\World;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\utils\SingletonTrait;

final class CustomiesSoundFactory{
	use SingletonTrait;

	/**
	 * Creates the Sound Class.
	 * @param string $soundName The name of the Sound (as per the name set in texture pack).
	 * @param float $volume The volume of the sound.
	 * @param float $pitch The pitch of the sound.
	 * @return CustomSound
	 */
	public function createSound(string $soundName, float $volume = 1.0, float $pitch = 1.0): CustomSound{
		return new CustomSound($soundName, $volume, $pitch);
	}
	
	public function playSoundForPlayers(string $soundName, float $volume = 1.0, float $pitch = 1.0, Vector3 $pos, World $world, array $players){
		$sound = new CustomSound($soundName, $volume, $pitch);
		$world->addSound($pos, $sound, [$players]);
	}

	public function playSoundForPlayer(Player $player, string $soundName, Vector3 $pos){
		$player->getNetworkSession()->sendDataPacket(PlaySoundPacket::create($soundName, $pos->getX(), $pos->getY(), $pos->getZ(), 1.0, 1.0), true);
	}
}