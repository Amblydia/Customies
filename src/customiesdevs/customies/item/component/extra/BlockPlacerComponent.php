<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\extra;

use pocketmine\block\Block;
use pocketmine\world\format\io\GlobalBlockStateHandlers;
use customiesdevs\customies\item\component\ItemComponent;

final class BlockPlacerComponent implements ItemComponent {

	private Block $block;
	private bool $useAsIcon;
	private array $useOn = [];

	/**
	 * Sets the item as a Planter item component for blocks. Items with this component will place a block when used.
	 * @param Block $block Eg: `VanillaBlocks::STONE()`
	 * @param bool $canUseBlockAsIcon
	 */
	public function __construct(Block $block, bool $useAsIcon = true) {
		$this->block = $block;
		$this->useAsIcon = $useAsIcon;
	}

	public function getName(): string {
		return "minecraft:block_placer";
	}

	public function getValue(): array {
		return [
			"block" => GlobalBlockStateHandlers::getSerializer()->serialize($this->block->getStateId())->getName(),
			"canUseBlockAsIcon" => $this->useAsIcon ? 1 : 0,
			"use_on" => $this->useOn
		];
	}

	public function isProperty(): bool {
		return false;
	}

	/**
	 * Add blocks to the `use_on` array in the required format.
	 * @param Block ...$blocks Eg: `VanillaBlocks::GRASS()`
	 */
	public function useOn(Block ...$blocks): BlockPlacerComponent{
		foreach($blocks as $block){
			$this->useOn[] = [
				"name" => GlobalBlockStateHandlers::getSerializer()->serialize($block->getStateId())->getName()
			];
		}
		return $this;
	}
}