<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use pocketmine\block\Block;
use pocketmine\world\format\io\GlobalBlockStateHandlers;

final class BlockPlacerComponent implements ItemComponent {

	private string $blockIdentifier;
	private array $useOn;

	/**
	 * Sets the item as a Planter item component for blocks. Items with this component will place a block when used.
	 * @param string $blockIdentifier
	 */
	public function __construct(string $blockIdentifier) {
		$this->blockIdentifier = $blockIdentifier;
	}

	public function getName(): string {
		return "minecraft:block_placer";
	}

	public function getValue(): array {
		return [
			"block" => $this->blockIdentifier,
			"use_on" => $this->useOn
		];
	}

	public function useOn(Block ...$blocks): BlockPlacerComponent {
		foreach($blocks as $block){
			$this->useOn[] = [
				"name" => GlobalBlockStateHandlers::getSerializer()->serialize($block->getStateId())->getName(),
				"states" => [],
				"tags" => ""
			];
		}
		return $this;
	}

	public function isProperty(): bool {
		return false;
	}
}
