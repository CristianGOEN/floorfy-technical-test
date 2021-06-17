<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Application\Create;

use Floorfy\Agency\Properties\Application\Create\CreatePropertyRequest;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Agency\Properties\Domain\PropertyDescriptionMother;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Properties\Domain\PropertyTitleMother;

final class CreatePropertyRequestMother
{
    public static function create(PropertyId $id, PropertyTitle $title, PropertyDescription $description): CreatePropertyRequest
    {
        return new CreatePropertyRequest($id->value(), $title->value(), $description->value());
    }

    public static function random(): CreatePropertyRequest
    {
        return self::create(PropertyIdMother::random(), PropertyTitleMother::random(), PropertyDescriptionMother::random());
    }
}
