<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component\properties;

use customiesdevs\customies\item\component\ItemComponent;

final class HoverTextColorProperty implements ItemComponent {

	private string $value;

	/**
	 * Determines the color of the item name when hovering over it.
	 * @param string $value Specifies the color of the item's hover text
	 * @link [List of Color Code](https://minecraft.wiki/w/Formatting_codes#Color_codes)
	 */
	public function __construct(string $value = "§s") {
		$this->value = $value;
	}

	public function getName(): string {
		return "hover_text_color";
	}

	public function getValue(): string {
		return $this->value;
	}

	public function isProperty(): bool {
		return true;
	}
}