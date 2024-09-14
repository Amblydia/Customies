<?php
declare(strict_types=1);

namespace customiesdevs\customies\sound;

use pocketmine\world\sound\Sound;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

class CustomSound implements Sound{

    private string $soundName;
    private float $volume;
    private float $pitch;

    public function __construct(string $soundName, float $volume = 1.0, float $pitch = 1.0){
        $this->soundName = $soundName;
        $this->volume = $volume;
        $this->pitch = $pitch;
    }

    public function getName(): string{
        return $this->soundName;
    }

    public function getVolume(): float{
        return $this->volume;
    }

    public function getPitch(): float{
        return $this->pitch;
    }
    
    public function encode(Vector3 $pos) : array{ 
        return [PlaySoundPacket::create($this->soundName, $pos->getX(), $pos->getY(), $pos->getZ(), $this->volume, $this->pitch)];
    }
}