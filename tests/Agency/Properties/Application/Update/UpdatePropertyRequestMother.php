<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Application\Update;

use Floorfy\Agency\Properties\Application\Update\UpdatePropertyRequest;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Agency\Properties\Domain\PropertyDescriptionMother;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Properties\Domain\PropertyTitleMother;

final class UpdatePropertyRequestMother
{
    public static function create(PropertyId $id, PropertyTitle $title, PropertyDescription $description): UpdatePropertyRequest
    {
        return new UpdatePropertyRequest($id->value(), $title->value(), $description->value());
    }

    public static function random(): UpdatePropertyRequest
    {
        return self::create(PropertyIdMother::random() ,PropertyTitleMother::random(), PropertyDescriptionMother::random());
    }
}
