<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Update;

use Floorfy\Agency\Tours\Application\Find\TourFinder;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class TourUpdater
{
    private TourFinder $finder;

    public function __construct(private TourRepository $repository)
    {
        $this->finder = new TourFinder($repository);
    }

    public function __invoke(UpdateTourRequest $request): void
    {
        $tour = $this->finder->__invoke(new TourId($request->id()));

        $propertyId = new PropertyId($request->propertyId());
        $enabled = $request->enabled();

        $tour->update($propertyId, $enabled);

        $this->repository->update($tour);
    }
}
