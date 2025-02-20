<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class TagsComponent implements ItemComponent {

	private array $tags = [];

	/**
	 * Determines which tags are included on a given item.
	 * @param array $tags An array that can contain multiple item tags
	 * @link [ItemTags](https://wiki.bedrock.dev/items/item-tags.html)
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