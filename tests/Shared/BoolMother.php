<?php

declare(strict_types=1);

namespace Tests\Shared;

final class BoolMother
{
    public static function random(): bool
    {
        return MotherCreator::random()->boolean();
    }
}
