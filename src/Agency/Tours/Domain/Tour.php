<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Domain;

use Floorfy\Shared\Domain\Properties\PropertyId;

final class Tour
{
    public function __construct(private TourId $id, private PropertyId $propertyId, private bool $enabled)
    {
    }

    public static function create(TourId $id, PropertyId $propertyId, bool $enabled): self
    {
        return new self($id, $propertyId, $enabled);
    }

    public function id(): TourId
    {
        return $this->id;
    }

    public function propertyId(): PropertyId
    {
        return $this->propertyId;
    }

    public function enabled(): bool
    {
        return $this->enabled;
    }

    public function update(PropertyId $propertyId, bool $enabled): void
    {
        $this->propertyId = $propertyId;
        $this->enabled = $enabled;
    }
}
