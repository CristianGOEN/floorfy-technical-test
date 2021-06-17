<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Domain;

use Floorfy\Agency\Tours\Domain\TourId;
use Tests\Shared\UuidMother;

final class TourIdMother
{
    public static function create(string $value): TourId
    {
        return new TourId($value);
    }

    public static function random(): TourId
    {
        return self::create(UuidMother::random());
    }
}
