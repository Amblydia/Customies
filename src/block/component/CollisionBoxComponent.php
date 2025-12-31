<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\component;

use customiesdevs\customies\block\properties\Box;
use pocketmine\math\Vector3;

class CollisionBoxComponent implements BlockComponent {

	private bool $enabled;
	/** @var Box[] */
	private array $boxes = [];

	/**
	 * Defines the area of the block that collides with entities.
	 * @param bool $enabled If collision should be enabled
	 */
	public function __construct(bool $enabled = true) {
		$this->enabled = $enabled;
	}

	/**
	 * Adds a single collision box.
	 * @param Box $box
	 * The collision box to add.
	 * @return $this
	 */
	public function addBox(Box $box): self {
		$this->boxes[] = $box;
		return $this;
	}

	/**
	 * Adds multiple collision boxes.
	 * @param Box[] $boxes
	 * An array of collision boxes to add.
	 * @return $this
	 */
	public function addBoxes(array $boxes): self {
		foreach($boxes as $box) {
			$this->boxes[] = $box;
		}
		return $this;
	}

	public function getName(): string {
		return 'minecraft:collision_box';
	}

	public function getValue(): array {
		$convertedBoxes = [];
		foreach($this->boxes as $box) {
			$convertedBoxes[] = $box->toNbtArray();
		}
		//if no boxes are defined we add a default full block box
		if(empty($convertedBoxes) && $this->enabled) {
			$convertedBoxes[] = (new Box(new Vector3(-8, 0, -8), new Vector3(16, 16, 16)))->toNbtArray();
		}
		if(!$this->enabled) {
			$convertedBoxes[] = [];
		}
		return [
			"boxes" => $convertedBoxes,
			"enabled" => $this->enabled
		];
	}
}