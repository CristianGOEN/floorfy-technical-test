<?php

namespace App\Http\Controllers\Api\Tour;

use Floorfy\Agency\Tours\Application\Update\TourUpdater;
use Floorfy\Agency\Tours\Application\Update\UpdateTourRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourPutController
{
    public function __construct(private TourUpdater $updater)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->updater->__invoke(
            new UpdateTourRequest(
                $request->get('id'),
                $request->get('property_id'),
                $request->get('enabled'),
            )
        );

        return new Response('', Response::HTTP_OK);
    }
}
