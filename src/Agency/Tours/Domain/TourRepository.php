<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Domain;

use Floorfy\Shared\Domain\Properties\PropertyId;

interface TourRepository
{
    public function save(Tour $tour): void;
    public function search(TourId $id): ?Tour;
    public function update(Tour $tour): void;
    public function searchToursByProperty(PropertyId $id): ?Tours;
}
