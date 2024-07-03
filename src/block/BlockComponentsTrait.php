<?php

namespace customiesdevs\customies\block;

use customiesdevs\customies\block\component\BlockComponent;
use customiesdevs\customies\block\component\DestructibleByMiningComponent;
use customiesdevs\customies\block\component\FrictionComponent;
use customiesdevs\customies\block\component\LightDampeningComponent;
use customiesdevs\customies\block\component\LightEmissionComponent;
use customiesdevs\customies\item\component\CreativeCategoryComponent;
use customiesdevs\customies\item\component\CreativeGroupComponent;
use customiesdevs\customies\item\CreativeInventoryInfo;

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
	 * @return BlockComponent
	 */
	public function getComponents(): array {
		return $this->components;
	}

	/**
	 * Initializes the block with default components that are required for the block to function correctly.
	 */
	protected function initComponent(): void {
		$this->addComponent(new LightEmissionComponent());
		$this->addComponent(new LightDampeningComponent());
		$this->addComponent(new DestructibleByMiningComponent());
		$this->addComponent(new FrictionComponent());
	}
}