<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

use customiesdevs\customies\item\CreativeInventoryInfo;

final class ItemPropertiesComponent implements ItemComponent {

    private AllowOffHandComponent $allowOffHand;
    private CanDestroyInCreativeComponent $canDestroyInCreative;
    private CreativeInventoryInfo $creativeInfo;
    private DamageComponent $damage;
    private EnchantableComponent $enchantable;
    private GlintComponent $foil;
    private HandEquippedComponent $handEquipped;
    private HoverTextColorComponent $hoverTextColor;
    private LiquidClippedComponent $liquidClipped;
    private MaxStackSizeComponent $maxStackSize;
    private IconComponent $icon;
    private ShouldDespawnComponent $shouldDespawn;
    private StackedByDataComponent $stackedByData;
    private UseAnimationComponent $useAnimation;
    private UseModifiersComponent $useDuration;

	public function __construct() {
	}

	public function getName(): string {
		return "item_properties";
	}

	public function getValue(): array {
		return [
            "allow_off_hand" => $this->allowOffHand->getValue(),
            "can_destroy_in_creative" => $this->canDestroyInCreative->getValue(),
            "creative_category" => $this->creativeInfo->getNumericCategory(),
            "creative_group" => $this->creativeInfo->getGroup(),
            "damage" => $this->damage->getValue(),
            "enchantable_slot" => $this->enchantable->getEnchantableSlot(),
            "enchantable_value" => $this->enchantable->getEnchantableValue(),
            "foil" => $this->foil->getValue(),
            "frame_count" => true,
            "hand_equipped" => $this->handEquipped->getValue(),
            //"hover_text_color" => $this->hoverTextColor->getValue(),
            "liquid_clipped" => $this->liquidClipped->getValue(),
            "max_stack_size" => $this->maxStackSize->getValue(),
            "minecraft:icon" => [
                "textures" => [
                    "default" => $this->icon->getDefaultTexture(),
                    "dyed" => $this->icon->getDyedTexture(),
                    "icon_trim" => $this->icon->getIconTrimTexture()
                ]
            ],
            "mining_speed" => 1,
            "should_despawn" => $this->shouldDespawn->getValue(),
            "stacked_by_data" => $this->stackedByData->getValue(),
            "use_animation" => $this->useAnimation->getValue(),
            "use_duration" => $this->useDuration->getUseDuration()
        ];
	}

	public function isProperty(): bool {
		return false;
	}

	/**
	 * @param AllowOffHandComponent $allowOffHand 
	 * @return self
	 */
	public function setAllowOffHand(AllowOffHandComponent $allowOffHand): self {
		$this->allowOffHand = $allowOffHand;
		return $this;
	}
	
	/**
	 * @param CanDestroyInCreativeComponent $canDestroyInCreative 
	 * @return self
	 */
	public function setCanDestroyInCreative(CanDestroyInCreativeComponent $canDestroyInCreative): self {
		$this->canDestroyInCreative = $canDestroyInCreative;
		return $this;
	}
	
	/**
	 * @param CreativeInventoryInfo $creativeInfo 
	 * @return self
	 */
	public function setCreativeInfo(CreativeInventoryInfo $creativeInfo): self {
		$this->creativeInfo = $creativeInfo;
		return $this;
	}
	
	/**
	 * @param DamageComponent $damage 
	 * @return self
	 */
	public function setDamage(DamageComponent $damage): self {
		$this->damage = $damage;
		return $this;
	}
	
	/**
	 * @param EnchantableComponent $enchantable 
	 * @return self
	 */
	public function setEnchantable(EnchantableComponent $enchantable): self {
		$this->enchantable = $enchantable;
		return $this;
	}
	
	/**
	 * @param GlintComponent $foil 
	 * @return self
	 */
	public function setFoil(GlintComponent $foil): self {
		$this->foil = $foil;
		return $this;
	}
	
	/**
	 * @param HandEquippedComponent $handEquipped 
	 * @return self
	 */
	public function setHandEquipped(HandEquippedComponent $handEquipped): self {
		$this->handEquipped = $handEquipped;
		return $this;
	}

    /**
	 * @param HoverTextColorComponent $hoverTextColor 
	 * @return self
	 */
	public function setHoverTextColor(HoverTextColorComponent $hoverTextColor): self {
		$this->hoverTextColor = $hoverTextColor;
		return $this;
	}
	
	/**
	 * @param LiquidClippedComponent $liquidClipped 
	 * @return self
	 */
	public function setLiquidClipped(LiquidClippedComponent $liquidClipped): self {
		$this->liquidClipped = $liquidClipped;
		return $this;
	}
	
	/**
	 * @param MaxStackSizeComponent $maxStackSize 
	 * @return self
	 */
	public function setMaxStackSize(MaxStackSizeComponent $maxStackSize): self {
		$this->maxStackSize = $maxStackSize;
		return $this;
	}
	
	/**
	 * @param IconComponent $icon 
	 * @return self
	 */
	public function setIcon(IconComponent $icon): self {
		$this->icon = $icon;
		return $this;
	}
	
	/**
	 * @param ShouldDespawnComponent $shouldDespawn 
	 * @return self
	 */
	public function setShouldDespawn(ShouldDespawnComponent $shouldDespawn): self {
		$this->shouldDespawn = $shouldDespawn;
		return $this;
	}
	
	/**
	 * @param StackedByDataComponent $stackedByData 
	 * @return self
	 */
	public function setStackedByData(StackedByDataComponent $stackedByData): self {
		$this->stackedByData = $stackedByData;
		return $this;
	}
	
	/**
	 * @param UseAnimationComponent $useAnimation 
	 * @return self
	 */
	public function setUseAnimation(UseAnimationComponent $useAnimation): self {
		$this->useAnimation = $useAnimation;
		return $this;
	}
	
	/**
	 * @param UseModifiersComponent $useDuration 
	 * @return self
	 */
	public function setUseDuration(UseModifiersComponent $useDuration): self {
		$this->useDuration = $useDuration;
		return $this;
	}
}