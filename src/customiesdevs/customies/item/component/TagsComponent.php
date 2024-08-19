<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class TagsComponent implements ItemComponent {

	private array $tags;

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