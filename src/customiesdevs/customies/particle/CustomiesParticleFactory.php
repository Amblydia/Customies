<?php
declare(strict_types=1);

namespace customiesdevs\customies\particle;

use pocketmine\world\World;
use pocketmine\math\Vector3;
use customiesdevs\customies\particle\CustomParticle;

class CustomiesParticleFactory{

    /**
     * Creates and spawns a custom particle at the given position in the world.
     * 
     * @param string $nameParticle The name of the particle to be created.
     * @param World $world The world where the particle should be spawned.
     * @param Vector3 $pos The position in the world where the particle should appear.
     * 
     * @return void
     */
    public function createParticle(string $nameParticle, World $world, Vector3 $pos): void {
        $world->addParticle($pos, new CustomParticle($nameParticle));
    }
}