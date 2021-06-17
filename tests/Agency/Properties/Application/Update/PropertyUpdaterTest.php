<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Application\Update;

use Floorfy\Agency\Properties\Application\Update\PropertyUpdater;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Tests\Agency\Properties\Domain\PropertyDescriptionMother;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\Agency\Properties\Domain\PropertyTitleMother;
use Tests\TestCase;

final class PropertyUpdaterTest extends TestCase
{
    /** @test */
    public function it_should_update_an_existing_property(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(PropertyRepository::class);
        $updater = new PropertyUpdater($repository);

        $property = PropertyMother::random();

        $repository->expects($this->once())->method("search")->with($property->id())->willReturn($property);

        $updatePropertyRequest = UpdatePropertyRequestMother::create($property->id(), PropertyTitleMother::random(), PropertyDescriptionMother::random());

        $updatedProperty = PropertyMother::updateFromRequest($updatePropertyRequest);

        $repository->expects($this->once())->method("update")->with($updatedProperty);

        $updater->__invoke($updatePropertyRequest);
    }
}
