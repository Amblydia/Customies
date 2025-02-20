<?php

namespace customiesdevs\customies\block\component;

use pocketmine\nbt\tag\CompoundTag;

class GeometryComponent implements BlockComponent {

	private string $geometry;
	private CompoundTag $boneVisibility;
	private bool $enableBone;

	/**
	 * The description identifier of the geometry to use to render this block. This identifier must either match an existing geometry identifier in any of the loaded resource packs or be one of the currently supported Vanilla identifiers: "minecraft:geometry.full_block" or "minecraft:geometry.cross".
	 * @param string $geometry
	 * @param bool $enableBone
	 */
	public function __construct(string $geometry = "geometry.full_block", bool $enableBone = false) {
		$this->geometry = $geometry;
		$this->enableBone = $enableBone;
		$this->boneVisibility = CompoundTag::create();
	}

	public function getName(): string {
		return "minecraft:geometry";
	}

	public function getValue(): CompoundTag {
		$data = CompoundTag::create();
		$data->setString("culling", "");
		$data->setString("identifier", $this->geometry);
		if($this->enableBone){
			$data->setTag("bone_visibility", $this->boneVisibility);
		}
		return $data;
	}

	/**
     * Adds a bone visibility to the component.
     * @param string $boneName
     * @param bool|string $visibility Boolean (0/1) or Molang expression string.
     */
    public function addBoneVisibility(string $boneName, bool|string $visibility): GeometryComponent {
        if(is_string($visibility) && !is_bool($visibility)){
            $this->boneVisibility->setTag($boneName, CompoundTag::create()
                ->setString("expression", $visibility)
                ->setInt("version", 12));
        }elseif(is_bool($visibility)){
            $this->boneVisibility->setByte($boneName, ($visibility ? 1 : 0));
        }
		return $this;
    }
}