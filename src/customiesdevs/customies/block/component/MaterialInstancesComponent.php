<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class MaterialInstancesComponent implements BlockComponent {

	public const TARGET_ALL = "*";
	public const TARGET_SIDES = "sides";
	public const TARGET_UP = "up";
	public const TARGET_DOWN = "down";
	public const TARGET_NORTH = "north";
	public const TARGET_EAST = "east";
	public const TARGET_SOUTH = "south";
	public const TARGET_WEST = "west";

	public const RENDER_METHOD_ALPHA_TEST = "alpha_test";
	public const RENDER_METHOD_BLEND = "blend";
	public const RENDER_METHOD_OPAQUE = "opaque";

	private array $targets = [];

	/**
	 * The material instances for a block. Maps face or material_instance names in a geometry file to an actual material instance. You can assign a material instance object to any of these faces: "up", "down", "north", "south", "east", "west", or "*"
	 */
	public function __construct() {
		$this->targets = [];
	}

	public function getName(): string {
		return "minecraft:material_instances";
	}

	public function getValue(): CompoundTag {
		$materialsTag = CompoundTag::create();
		foreach($this->targets as $target => $properties){
			$materialTag = CompoundTag::create()
				->setString("texture", $properties["texture"]);
			if(isset($properties["render_method"])){
				$materialTag->setString("render_method", $properties["render_method"]);
			}
			if(isset($properties["ambient_occlusion"])){
				$materialTag->setByte("ambient_occlusion", $properties["ambient_occlusion"] ? 1 : 0);
			}
			if(isset($properties["face_dimming"])){
				$materialTag->setByte("face_dimming", $properties["face_dimming"] ? 1 : 0);
			}
			if(isset($properties["tint_method"])){
				$materialTag->setString("tint_method", $properties["tint_method"]);
			}
			$materialsTag->setTag($target, $materialTag);
		}
		return CompoundTag::create()
			->setTag("mappings", CompoundTag::create())
			->setTag("materials", $materialsTag);
	}

	/** Get the List of Targets added to the component */
	public function getTargets(): array {
		return $this->targets;
	}

	/**
     * Adds a target to the component.
     * @param string $target - Eg: `MaterialInstancesComponent::TARGET_ALL`
	 * @param string $texture - Eg: `custom_texture`
	 * @param string $renderMethod - Eg: `RENDER_METHOD_OPAQUE`
	 * @param bool $ambientOcclusion Eg: `true`
	 * @param bool $faceDimming Eg: true
	 * @param string $tintMethod - default `none`
     */
	public function addTarget(
		string $target = MaterialInstancesComponent::TARGET_ALL,
		string $texture,
		string $renderMethod = MaterialInstancesComponent::RENDER_METHOD_OPAQUE,
		bool $ambientOcclusion = true,
		bool $faceDimming = true,
		string $tintMethod = "none"): MaterialInstancesComponent {
		$this->targets[$target] = [
			"texture" => $texture,
			"render_method" => $renderMethod,
			"ambient_occlusion" => $ambientOcclusion,
			"face_dimming" => $faceDimming,
			"tint_method" => $tintMethod
		];
		return $this;
	}
}