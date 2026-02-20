<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations;

use customiesdevs\customies\block\component\BlockComponent;

class BlockPermutation {

	/**
	 * @param string $condition The condition to evaluate for this permutation
	 * @param BlockComponent $component The component to apply if the condition is met
	 */
	public function __construct(
		private readonly string $condition,
		private readonly BlockComponent $component
	) {}

	/**
	 * Gets the condition string for this permutation.
	 */
	public function getCondition(): string {
		return $this->condition;
	}

	/**
	 * Gets the component associated with this permutation.
	 * @return BlockComponent
	 */
	public function getComponent(): BlockComponent {
		return $this->component;
	}

	/**
	 * Converts the BlockPermutation to an array format.
	 */
	public function toArray(): array {
		return [
			"condition" => $this->condition,
			"components" => [
				$this->component->getName() => $this->component->getValue()
			]
		];
	}
}