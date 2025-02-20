<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class ItemTagsComponent implements ItemComponent {

	private array $tags = [];

	/**
	 * Determines which items tags are included on a given item.
	 * @param array $tags An array that can contain multiple item tags
	 * @link [ItemTags](https://wiki.bedrock.dev/items/item-tags.html)
	 */
	public function __construct(array $tags) {
		$this->tags = $tags;
	}

	public function getName(): string {
		return "item_tags";
	}

	public function getValue(): array {
		return $this->tags;
	}

	public function isProperty(): bool {
		return false;
	}
}