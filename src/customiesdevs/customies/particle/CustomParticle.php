<?php
declare(strict_types=1);

namespace customiesdevs\customies\particle;

use pocketmine\world\particle\Particle;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;
use pocketmine\network\mcpe\protocol\types\DimensionIds;

class CustomParticle implements Particle{

	private string $particleName;

	public function __construct(string $particleName){
		$this->particleName = $particleName;
	}

	public function getParticleName(): string{
		return $this->particleName;
	}

	public function encode(Vector3 $pos): array {
		return [SpawnParticleEffectPacket::create(DimensionIds::OVERWORLD, -1, $pos, $this->particleName, null)];
	}
}