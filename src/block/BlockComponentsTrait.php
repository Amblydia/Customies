<?php

namespace customiesdevs\customies\block;

use customiesdevs\customies\block\component\BlockComponent;

trait BlockComponentsTrait {
    
    /** @var BlockComponent[] */
    private array $components;

    public function addComponent(BlockComponent $component): void {
        $this->components[$component->getName()] = $component;
    }

    public function hasComponent(string $name): bool {
        return isset($this->components[$name]);
    }

    /**
     * @return array
     */
    public function getComponents(): array {
        return $this->components;
    }
}