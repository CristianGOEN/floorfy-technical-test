<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Find;

final class ToursByPropertyResponse
{
    public function __construct(private array $tours)
    {
    }

    public function tours(): array
    {
        return $this->tours;
    }
}
