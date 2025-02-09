<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class BlockPlacerComponent implements ItemComponent {

<<<<<<< Updated upstream
    private string $blockIdentifier;
    private array $useOn;

    public function __construct(string $blockIdentifier, array $useOn) {
        $this->blockIdentifier = $blockIdentifier;
        $this->useOn = $useOn;
    }
=======
	private Block $block;
	private bool $canUseBlockAsIcon;
	private array $useOn = [];

	/**
	 * Sets the item as a Planter item component for blocks. Items with this component will place a block when used.
	 * @param Block $block
	 * @param bool $canUseBlockAsIcon
	 */
	public function __construct(Block $block, bool $canUseBlockAsIcon = true) {
		$this->block = $block;
		$this->canUseBlockAsIcon = $canUseBlockAsIcon;
	}
>>>>>>> Stashed changes

    public function getName(): string {
        return "minecraft:block_placer";
    }

<<<<<<< Updated upstream
    public function getValue(): array {
        return [
            "block" => $this->blockIdentifier,
            "use_on" => $this->useOn
        ];
    }
=======
	public function getValue(): array {
		return [
			"block" => GlobalBlockStateHandlers::getSerializer()->serialize($this->block->getStateId())->getName(),
			"canUseBlockAsIcon" => $this->canUseBlockAsIcon,
			"use_on" => $this->useOn
		];
	}
>>>>>>> Stashed changes

    public function isProperty(): bool {
        return false;
    }
}
