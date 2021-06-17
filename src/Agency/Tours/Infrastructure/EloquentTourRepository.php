<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Infrastructure;

use App\Models\TourEloquentModel;
use Floorfy\Agency\Tours\Domain\Tour;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Floorfy\Agency\Tours\Domain\Tours;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class EloquentTourRepository implements TourRepository
{
    public function save(Tour $tour): void
    {
        $model = new TourEloquentModel();

        $model->id = $tour->id()->value();
        $model->property_id = $tour->propertyId()->value();
        $model->enabled = $tour->enabled();

        $model->save();
    }

    public function search(TourId $id): ?Tour
    {
        $model = TourEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new Tour(
            new TourId($model->id),
            new PropertyId($model->property_id),
            $model->enabled
        );
    }

    public function update(Tour $tour): void
    {
        $model = TourEloquentModel::find($tour->id()->value());
        $model->property_id = $tour->propertyId()->value();
        $model->enabled = $tour->enabled();
        $model->update();
    }

    public function searchToursByProperty(PropertyId $id): ?Tours
    {
        $model = TourEloquentModel::where('property_id', $id)->get()->toArray();

        if (count($model) == 0) {
            return null;
        }

        return new Tours($model);
    }
}
