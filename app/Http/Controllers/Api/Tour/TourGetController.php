<?php

namespace App\Http\Controllers\Api\Tour;

use Floorfy\Agency\Tours\Application\Find\TourFinderByProperty;
use Floorfy\Shared\Domain\Properties\PropertyId;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TourGetController
{
    public function __construct(private TourFinderByProperty $finder)
    {
    }

    public function __invoke(string $id): JsonResponse
    {
        $tours = $this->finder->__invoke(new PropertyId($id));

        return new JsonResponse($tours->tours(), Response::HTTP_OK, ['Access-Control-Allow-Origin' => '*']);
    }
}
