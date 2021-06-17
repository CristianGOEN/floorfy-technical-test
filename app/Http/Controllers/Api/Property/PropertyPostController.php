<?php

namespace App\Http\Controllers\Api\Property;

use Floorfy\Agency\Properties\Application\Create\CreatePropertyRequest;
use Floorfy\Agency\Properties\Application\Create\PropertyCreator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyPostController
{
    public function __construct(private PropertyCreator $creator)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->creator->__invoke(
            new CreatePropertyRequest(
                $request->get('id'),
                $request->get('title'),
                $request->get('description'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
