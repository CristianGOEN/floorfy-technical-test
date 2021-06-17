<?php

declare(strict_types=1);


namespace Tests\Agency\Tours\Domain;


use Floorfy\Agency\Tours\Domain\Tours;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class ToursMother
{
    public static function create(
        array $items,
    ): Tours
    {
        return new Tours(
            $items,
        );
    }

    public static function random(): Tours
    {
        return self::create(
            [TourMother::random(), TourMother::random()]
        );
    }

    public static function createWithId(PropertyId $id): Tours
    {
        return self::create(
            [TourMother::createWithId($id), TourMother::createWithId($id)]
        );
    }
}
