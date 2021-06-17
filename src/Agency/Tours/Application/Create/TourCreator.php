<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Create;

use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Domain\PropertyNotExist;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Tours\Domain\Tour;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class TourCreator
{
    public function __construct(private TourRepository $tourRepository, private PropertyRepository $propertyRepository)
    {
    }

    public function __invoke(CreateTourRequest $request): void
    {
        $propertyId = new PropertyId($request->propertyId());

        $property = $this->propertyRepository->search($propertyId);

        $this->ensurePropertyExists($property);

        $id = new TourId($request->id());
        $enabled = $request->enabled();

        $tour = Tour::create(
            $id,
            $propertyId,
            $enabled,
        );

        $this->tourRepository->save($tour);
    }

    private function ensurePropertyExists(Property $property = null): void
    {
        if (null === $property) {
            throw new PropertyNotExist();
        }
    }
}
