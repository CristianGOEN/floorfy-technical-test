<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Application\Find;

use Floorfy\Agency\Tours\Domain\Tour;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Agency\Tours\Domain\TourNotExist;
use Floorfy\Agency\Tours\Domain\TourRepository;

final class TourFinder
{
    public function __construct(private TourRepository $repository)
    {
    }

    public function __invoke(TourId $id): ?Tour
    {
        $tour = $this->repository->search($id);

        $this->ensureTourExists($tour);

        return $tour;
    }

    private function ensureTourExists(Tour $tour = null): void
    {
        if (null === $tour) {
            throw new TourNotExist();
        }
    }
}
