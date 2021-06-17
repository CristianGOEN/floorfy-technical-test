<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Domain;

use Floorfy\Agency\Tours\Application\Create\CreateTourRequest;
use Floorfy\Agency\Tours\Application\Update\UpdateTourRequest;
use Floorfy\Agency\Tours\Domain\Tour;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Shared\BoolMother;


final class TourMother
{
    public static function create(
        TourId $id,
        PropertyId $propertyId,
        bool $enabled
    ): Tour
    {
        return new Tour(
            $id,
            $propertyId,
            $enabled,
        );
    }

    public static function createFromRequest(CreateTourRequest $request): Tour
    {
        return self::create(
            TourIdMother::create($request->id()),
            PropertyIdMother::create($request->propertyId()),
            $request->enabled()
        );
    }

    public static function random(): Tour
    {
        return self::create(
            TourIdMother::random(),
            PropertyIdMother::random(),
            BoolMother::random()
        );
    }

    public static function createWithId(PropertyId $id): Tour
    {
        return self::create(
            TourIdMother::random(),
            $id,
            BoolMother::random()
        );
    }

    public static function updateFromRequest(UpdateTourRequest $request): Tour
    {
        return self::create(
            TourIdMother::create($request->id()),
            PropertyIdMother::create($request->propertyId()),
            $request->enabled()
        );
    }
}
