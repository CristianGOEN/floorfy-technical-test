<?php

namespace App\Http\Controllers\Api\Tour;

use Floorfy\Agency\Tours\Application\Create\CreateTourRequest;
use Floorfy\Agency\Tours\Application\Create\TourCreator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourPostController
{
    public function __construct(private TourCreator $creator)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->creator->__invoke(
            new CreateTourRequest(
                $request->get('id'),
                $request->get('property_id'),
                $request->get('enabled'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
