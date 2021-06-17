<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Domain;

use Floorfy\Shared\Domain\Properties\PropertyId;

interface PropertyRepository
{
    public function save(Property $property): void;
    public function search(PropertyId $id): ?Property;
    public function update(Property $property): void;
}
