<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Find;

use Floorfy\Agency\Tours\Domain\TourNotFoundByProperty;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Floorfy\Agency\Tours\Domain\Tours;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class TourFinderByProperty
{
    public function __construct(private TourRepository $repository)
    {
    }

    public function __invoke(PropertyId $id): ToursByPropertyResponse
    {
        $tours = $this->repository->searchToursByProperty($id);

        $this->ensureTourExistsByProperty($tours);

        return new ToursByPropertyResponse($tours->items());
    }

    private function ensureTourExistsByProperty(Tours $tours = null): void
    {
        if (null === $tours) {
            throw new TourNotFoundByProperty();
        }
    }
}
