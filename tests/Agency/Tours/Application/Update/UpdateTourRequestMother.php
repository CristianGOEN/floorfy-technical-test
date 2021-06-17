<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Update;

use Floorfy\Agency\Tours\Application\Update\UpdateTourRequest;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Tours\Domain\TourIdMother;
use Tests\Shared\BoolMother;

final class UpdateTourRequestMother
{
    public static function create(TourId $id, PropertyId $propertyId, bool $enabled): UpdateTourRequest
    {
        return new UpdateTourRequest($id->value(), $propertyId->value(), $enabled);
    }

    public static function random(): UpdateTourRequest
    {
        return self::create(TourIdMother::random(), PropertyIdMother::random(), BoolMother::random());
    }
}
