<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Domain;

use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Tests\Shared\ParagraphMother;

final class PropertyDescriptionMother
{
    public static function create(string $value): PropertyDescription
    {
        return new PropertyDescription($value);
    }

    public static function random(): PropertyDescription
    {
        return self::create(ParagraphMother::random());
    }
}
