<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Update;

final class UpdateTourRequest
{
    public function __construct(private string $id, private string $propertyId, private bool $enabled)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function propertyId(): string
    {
        return $this->propertyId;
    }

    public function enabled(): bool
    {
        return $this->enabled;
    }
}
