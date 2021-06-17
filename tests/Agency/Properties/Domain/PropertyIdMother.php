<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Domain;

use Floorfy\Shared\Domain\Properties\PropertyId;
use Tests\Shared\UuidMother;

final class PropertyIdMother
{
    public static function create(string $value): PropertyId
    {
        return new PropertyId($value);
    }

    public static function random(): PropertyId
    {
        return self::create(UuidMother::random());
    }
}
