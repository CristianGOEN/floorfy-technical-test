<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Domain;

use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Tests\Shared\WordMother;

final class PropertyTitleMother
{
    public static function create(string $value): PropertyTitle
    {
        return new PropertyTitle($value);
    }

    public static function random(): PropertyTitle
    {
        return self::create(WordMother::random());
    }
}
