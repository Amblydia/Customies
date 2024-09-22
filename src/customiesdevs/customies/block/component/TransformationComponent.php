<?php

namespace customiesdevs\customies\block\component;

use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;

class TransformationComponent implements BlockComponent {

	private Vector3 $translation;
	private Vector3 $scale;
	private Vector3 $scalePivot;
	private Vector3 $rotation;
	private Vector3 $rotationPivot;

	/**
	 * The block's translation, rotation and scale with respect to the center of its world position
	 * @param Vector3 $translation The block's translation
	 * @param Vector3 $scale The block's scale
	 * @param Vector3 $scalePivot The point to apply scale around
	 * @param Vector3 $rotation The block's rotation in increments of 90 degrees
	 * @param Vector3 $rotationPivot The point to apply rotation around
	 */
	public function __construct(
		Vector3 $translation = new Vector3(0, 0, 0), 
		Vector3 $scale = new Vector3(1, 1, 1), 
		Vector3 $scalePivot = new Vector3(0, 0, 0), 
		Vector3 $rotation = new Vector3(0, 0, 0), 
		Vector3 $rotationPivot = new Vector3(0, 0, 0)
	) {
		$this->translation = $translation;
		$this->scale = $scale;
		$this->scalePivot = $scalePivot;
		$this->rotation = $rotation;
		$this->rotationPivot = $rotationPivot;
	}

	public function getName(): string {
		return "minecraft:transformation";
	}

	public function getValue(): CompoundTag {
		return CompoundTag::create()
			->setTag("translation", new ListTag([
				new FloatTag($this->translation->getX()),
				new FloatTag($this->translation->getY()),
				new FloatTag($this->translation->getZ())
			]))
			->setTag("scale", new ListTag([
				new FloatTag($this->scale->getX()),
				new FloatTag($this->scale->getY()),
				new FloatTag($this->scale->getZ())
			]))
			->setTag("scale_pivot", new ListTag([
				new FloatTag($this->scalePivot->getX()),
				new FloatTag($this->scalePivot->getY()),
				new FloatTag($this->scalePivot->getZ())
			]))
			->setTag("rotation", new ListTag([
				new FloatTag($this->rotation->getX()),
				new FloatTag($this->rotation->getY()),
				new FloatTag($this->rotation->getZ())
			]))
			->setTag("rotation_pivot", new ListTag([
				new FloatTag($this->rotationPivot->getX()),
				new FloatTag($this->rotationPivot->getY()),
				new FloatTag($this->rotationPivot->getZ())
			]));
	}
}