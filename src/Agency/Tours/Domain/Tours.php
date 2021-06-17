<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Domain;

final class Tours
{
    public function __construct(private array $items)
    {
    }

    public function items(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items());
    }
}
