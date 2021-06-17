<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Application\Find;

use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Domain\PropertyNotExist;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class PropertyFinder
{
    public function __construct(private PropertyRepository $repository)
    {
    }

    public function __invoke(PropertyId $id): ?Property
    {
        $property = $this->repository->search($id);

        $this->ensurePropertyExists($property);

        return $property;
    }

    private function ensurePropertyExists(Property $property = null): void
    {
        if (null === $property) {
            throw new PropertyNotExist();
        }
    }
}
