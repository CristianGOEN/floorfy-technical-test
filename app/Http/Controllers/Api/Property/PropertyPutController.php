<?php

namespace App\Http\Controllers\Api\Property;

use Floorfy\Agency\Properties\Application\Update\PropertyUpdater;
use Floorfy\Agency\Properties\Application\Update\UpdatePropertyRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyPutController
{
    public function __construct(private PropertyUpdater $updater)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->updater->__invoke(
            new UpdatePropertyRequest(
                $request->get('id'),
                $request->get('title'),
                $request->get('description'),
            )
        );

        return new Response('', Response::HTTP_OK);
    }
}
