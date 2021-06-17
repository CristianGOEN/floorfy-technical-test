<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Application\Create;

use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class PropertyCreator
{
    public function __construct(private PropertyRepository $repository)
    {
    }

    public function __invoke(CreatePropertyRequest $request): void
    {
        $id = new PropertyId($request->id());
        $title = new PropertyTitle($request->title());
        $description = new PropertyDescription($request->description());

        $property = Property::create(
            $id,
            $title,
            $description,
        );

        $this->repository->save($property);
    }
}
