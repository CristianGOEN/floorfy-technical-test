<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Domain;

use RuntimeException;

final class TourNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The tour does not exist');
    }
}
