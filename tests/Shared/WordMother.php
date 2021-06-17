<?php

declare(strict_types=1);

namespace Tests\Shared;

final class WordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word();
    }
}
