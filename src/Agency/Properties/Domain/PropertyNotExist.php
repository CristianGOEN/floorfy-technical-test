<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Domain;

use RuntimeException;

final class PropertyNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The property does not exist');
    }
}
