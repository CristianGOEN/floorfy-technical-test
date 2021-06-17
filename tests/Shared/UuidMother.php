<?php

declare(strict_types=1);

namespace Tests\Shared;

final class UuidMother
{
    public static function random(): string
    {
        return MotherCreator::random()->unique()->uuid;
    }
}
