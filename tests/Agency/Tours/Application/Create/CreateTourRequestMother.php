<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Create;

use Floorfy\Agency\Tours\Application\Create\CreateTourRequest;
use Floorfy\Agency\Tours\Domain\TourId;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Tours\Domain\TourIdMother;
use Tests\Shared\BoolMother;

final class CreateTourRequestMother
{
    public static function create(TourId $id, PropertyId $propertyId, bool $enabled): CreateTourRequest
    {
        return new CreateTourRequest($id->value(), $propertyId->value(), $enabled);
    }

    public static function random(): CreateTourRequest
    {
        return self::create(TourIdMother::random(), PropertyIdMother::random(), BoolMother::random());
    }
}
