<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Application\Update;

use Floorfy\Agency\Properties\Application\Find\PropertyFinder;
use Floorfy\Agency\Properties\Domain\PropertyDescription;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Properties\Domain\PropertyTitle;
use Floorfy\Shared\Domain\Properties\PropertyId;

final class PropertyUpdater
{
    private PropertyFinder $finder;

    public function __construct(private PropertyRepository $repository)
    {
        $this->finder = new PropertyFinder($repository);
    }

    public function __invoke(UpdatePropertyRequest $request): void
    {
        $property = $this->finder->__invoke(new PropertyId($request->id()));

        $title = new PropertyTitle($request->title());
        $description = new PropertyDescription($request->description());

        $property->update($title, $description);

        $this->repository->update($property);
    }
}
