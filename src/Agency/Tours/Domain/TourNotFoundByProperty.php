<?php

declare(strict_types=1);

namespace Floorfy\Agency\Tours\Domain;

use RuntimeException;

final class TourNotFoundByProperty extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('There are no tours for the given property');
    }
}
