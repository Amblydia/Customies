<?php
declare(strict_types=1);

namespace customiesdevs\customies\item;

use customiesdevs\customies\item\component\CooldownComponent;
use customiesdevs\customies\item\component\DisplayNameComponent;
use customiesdevs\customies\item\component\DurabilityComponent;
use customiesdevs\customies\item\component\FoodComponent;
use customiesdevs\customies\item\component\FuelComponent;
use customiesdevs\customies\item\component\ItemComponent;
use customiesdevs\customies\item\component\ProjectileComponent;
use customiesdevs\customies\item\component\properties\CanDestroyInCreativeProperty;
use customiesdevs\customies\item\component\properties\CreativeCategoryProperty;
use customiesdevs\customies\item\component\properties\CreativeGroupProperty;
use customiesdevs\customies\item\component\properties\IconProperty;
use customiesdevs\customies\item\component\properties\MaxStackSizeProperty;
use customiesdevs\customies\item\component\properties\UseAnimationProperty;
use customiesdevs\customies\item\component\TagsComponent;
use customiesdevs\customies\item\component\ThrowableComponent;
use customiesdevs\customies\item\component\UseModifiersComponent;
use customiesdevs\customies\item\component\WearableComponent;
use customiesdevs\customies\util\NBT;
use pocketmine\entity\Consumable;
use pocketmine\inventory\ArmorInventory;
use pocketmine\item\Armor;
use pocketmine\item\Durable;
use pocketmine\item\Food;
use pocketmine\item\ProjectileItem;
use pocketmine\nbt\tag\CompoundTag;
use RuntimeException;

trait ItemComponentsTrait {

	/** @var ItemComponent[] */
	private array $components;

	public function addComponent(ItemComponent $component): void {
		$this->components[$component->getName()] = $component;
	}

	public function hasComponent(string $name): bool {
		return isset($this->components[$name]);
	}

	public function getComponents(): CompoundTag {
		$components = CompoundTag::create();
		$properties = CompoundTag::create();
		foreach($this->components as $component){
			$tag = NBT::getTagType($component->getValue());
			if($tag === null) {
				throw new RuntimeException("Failed to get tag type for component " . $component->getName());
			}
			if($component->isProperty()) {
				$properties->setTag($component->getName(), $tag);
				continue;
			}
			$components->setTag("item_properties", $properties);
			$components->setTag($component->getName(), $tag);
		}
		return CompoundTag::create()
			->setTag("components", $components);
	}

	/**
	 * Initializes the item with default components that are required for the item to function correctly.
	 */
	protected function initComponent(string $texture, ?CreativeInventoryInfo $creativeInfo = null): void {
		$creativeInfo ??= CreativeInventoryInfo::DEFAULT();
		$this->addComponent(new CreativeCategoryProperty($creativeInfo));
		$this->addComponent(new CreativeGroupProperty($creativeInfo));
		$this->addComponent(new CanDestroyInCreativeProperty());
		$this->addComponent(new IconProperty($texture));
		$this->addComponent(new MaxStackSizeProperty($this->getMaxStackSize()));
		
		if($this instanceof Armor) {
			$slot = match ($this->getArmorSlot()) {
				ArmorInventory::SLOT_HEAD => WearableComponent::SLOT_ARMOR_HEAD,
				ArmorInventory::SLOT_CHEST => WearableComponent::SLOT_ARMOR_CHEST,
				ArmorInventory::SLOT_LEGS => WearableComponent::SLOT_ARMOR_LEGS,
				ArmorInventory::SLOT_FEET => WearableComponent::SLOT_ARMOR_FEET
			};
			$this->addComponent(new WearableComponent($slot, $this->getDefensePoints()));
		}

		if($this instanceof Consumable) {
			if($this instanceof Food) {
				$this->addComponent(new FoodComponent(!$this->requiresHunger()));
			}
			$this->addComponent(new UseAnimationProperty(UseAnimationProperty::ANIMATION_EAT));
			$this->addComponent(new UseModifiersComponent(0.35, 1.6));
			$this->addComponent(new TagsComponent([TagsComponent::TAG_IS_FOOD]));
		}

		// remove these in favor of customitem classes? since it would do the same as it
		if($this instanceof Durable) {
			$this->addComponent(new DurabilityComponent($this->getMaxDurability()));
		}

		if($this instanceof ProjectileItem) {
			$this->addComponent(new ProjectileComponent(1.25, "projectile"));
			$this->addComponent(new ThrowableComponent(true));
		}

		if($this->getName() !== "Unknown") {
			$this->addComponent(new DisplayNameComponent($this->getName()));
		}

		if($this->getFuelTime() > 0) {
			$this->addComponent(new FuelComponent($this->getFuelTime()));
		}
	}

	/**
	 * Set the number of seconds the item should be on cooldown for after being used. By default, the cooldown category
	 * will be the name of the item, but to share the cooldown across multiple items you can provide a shared category.
	 */
	protected function setUseCooldown(float $duration, string $category = ""): void {
		$this->addComponent(new CooldownComponent($category !== "" ? $category : $this->getName(), $duration));
	}
}
