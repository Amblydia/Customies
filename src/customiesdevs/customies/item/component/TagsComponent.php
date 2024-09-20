<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class TagsComponent implements ItemComponent {

	public const TAG_IS_FOOD = "minecraft:is_food";
	public const TAG_IS_SWORD = "minecraft:is_sword";
	public const TAG_IS_TOOL = "minecraft:is_tool";

	private array $tags;

	/**
	 * Determines which tags are included on a given item.
	 * @param array $tags
	 */
	public function __construct(array $tags) {
		$this->tags = $tags;
	}

	public function getName(): string {
		return "minecraft:tags";
	}

	public function getValue(): array {
		return [
            "tags" => $this->tags
        ];
	}

	public function isProperty(): bool {
		return false;
	}
}