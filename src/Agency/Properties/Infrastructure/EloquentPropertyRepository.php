<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Infrastructure;

use App\Models\PropertyEloquentModel;
use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class EloquentPropertyRepository implements PropertyRepository
{
    public function save(Property $property): void
    {
        $model = new PropertyEloquentModel();

        $model->id = $property->id()->value();
        $model->title = $property->title()->value();
        $model->description = $property->description()->value();

        $model->save();
    }

    public function search(PropertyId $id): ?Property
    {
        $model = PropertyEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new Property(
            new PropertyId($model->id),
            new PropertyTitle($model->title),
            new PropertyDescription($model->description),
        );
    }

    public function update(Property $property): void
    {
        $model = PropertyEloquentModel::find($property->id()->value());
        $model->title = $property->title()->value();
        $model->description = $property->description()->value();
        $model->update();
    }
}
