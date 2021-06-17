<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Application\Find;

use Floorfy\Agency\Properties\Application\Find\PropertyFinder;
use Floorfy\Agency\Properties\Domain\PropertyNotExist;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\TestCase;

final class PropertyFinderTest extends TestCase
{
    /** @test */
    public function it_should_throw_an_exception_when_the_property_not_exist(): void
    {
        $this->expectException(PropertyNotExist::class);

        $repository = $this->createMock(PropertyRepository::class);
        $finder = new PropertyFinder($repository);
        $id = PropertyIdMother::random();
        $repository->expects($this->once())->method("search")->with($id);
        $finder->__invoke($id);
    }

    /** @test */
    public function it_should_find_an_existing_property(): void
    {
        $property = PropertyMother::random();

        $repository = $this->createMock(PropertyRepository::class);
        $repository->expects($this->once())->method("search")->with($property->id())->willReturn($property);

        $finder = new PropertyFinder($repository);
        $propertyFromRepository = $finder->__invoke($property->id());

        $this->assertEquals($propertyFromRepository, $property);
    }
}
