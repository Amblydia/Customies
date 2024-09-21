<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class IconComponent implements ItemComponent {

	private string $defaultTexture;
	private string $dyedTexture;
	private string $trimTexture;

	/**
	 * Determines the icon to represent the item in the UI and elsewhere.
	 * @param string $defaultTexture
	 * @param string $dyedTexture
	 * @param string $trimTexture
	 */
	public function __construct(string $defaultTexture, string $dyedTexture = "", string $trimTexture = "") {
		$this->defaultTexture = $defaultTexture;
		$this->dyedTexture = $dyedTexture;
		$this->trimTexture = $trimTexture;
	}

	public function getName(): string {
		return "minecraft:icon";
	}

	public function getValue(): array {
		return [
			"textures" => [
				"default" => $this->defaultTexture,
				"dyed" => $this->dyedTexture,
				"icon_trim" => $this->trimTexture
			]
		];
	}

	public function getDefaultTexture() : string {
		return $this->defaultTexture;
	}

	public function getDyedTexture() : string {
		return $this->dyedTexture;
	}

	public function getIconTrimTexture() : string {
		return $this->trimTexture;
	}

	public function isProperty(): bool {
		return false;
	}
}