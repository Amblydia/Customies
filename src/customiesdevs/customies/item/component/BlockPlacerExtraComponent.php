<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class BlockPlacerExtraComponent implements ItemComponent {

    private bool $data;

    public function __construct(bool $data = true) {
        $this->data = $data;
    }

    public function getName(): string {
        return "minecraft:publisher_on_use_on";
    }

    public function getValue(): array {
        return ["autoSucceedOnClient" => $this->data ? 0 : 1];
    }

    public function isProperty(): bool {
        return false;
    }
}
