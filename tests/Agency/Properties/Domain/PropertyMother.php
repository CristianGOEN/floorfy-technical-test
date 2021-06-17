<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Domain;

use Floorfy\Agency\Properties\Application\Create\CreatePropertyRequest;
use Floorfy\Agency\Properties\Application\Update\UpdatePropertyRequest;
use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class PropertyMother
{
    public static function create(
        PropertyId $id,
        PropertyTitle $title,
        PropertyDescription $description
    ): Property
    {
        return new Property(
            $id,
            $title,
            $description,
        );
    }

    public static function createFromRequest(CreatePropertyRequest $request): Property
    {
        return self::create(
            PropertyIdMother::create($request->id()),
            PropertyTitleMother::create($request->title()),
            PropertyDescriptionMother::create($request->description()),
        );
    }

    public static function random(): Property
    {
        return self::create(
            PropertyIdMother::random(),
            PropertyTitleMother::random(),
            PropertyDescriptionMother::random(),
        );
    }

    public static function updateFromRequest(UpdatePropertyRequest $request): Property
    {
        return self::create(
            PropertyIdMother::create($request->id()),
            PropertyTitleMother::create($request->title()),
            PropertyDescriptionMother::create($request->description()),
        );
    }
}
