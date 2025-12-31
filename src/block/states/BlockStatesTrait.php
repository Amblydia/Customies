<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\states;

trait BlockStatesTrait {

	/**
	 * @var BlockState[]
	 */
	private array $states = [];

	private array $currentStates = [];

	/**
	 * Adds a state to the block.
	 * @param BlockState $state
	 */
	public function addState(BlockState $state): void {
		$this->states[$state->getName()] = $state;
	}

	/**
	 * Checks whether the block has a state with the given name.
	 * @param string $name
	 * @return bool
	 */
	public function hasState(string $name): bool {
		return isset($this->states[$name]);
	}

	/**
	 * Retrieves a state by its name.
	 * @param string $name
	 * @return BlockState|null
	 */
	public function getState(string $name): ?BlockState {
		return $this->states[$name] ?? null;
	}

	/**
	 * Returns all registered block states.
	 * @return BlockState[]
	 */
	public function getStates(): array {
		return $this->states;
	}

	public function setCurrentStates(array $states): void {
		$this->currentStates = $states;
	}

	public function getCurrentStates(): array {
		return [$this->currentStates];
	}
}
