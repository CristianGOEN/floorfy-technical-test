<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Find;

use Floorfy\Agency\Tours\Application\Find\TourFinderByProperty;
use Floorfy\Agency\Tours\Domain\TourNotFoundByProperty;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\Agency\Tours\Domain\ToursMother;
use Tests\TestCase;

final class TourFinderByPropertyTest extends TestCase
{
    /** @test */
    public function it_should_throw_an_exception_when_there_are_no_tours_for_the_given_property_id(): void
    {
        $this->expectException(TourNotFoundByProperty::class);

        $repository = $this->createMock(TourRepository::class);
        $finder = new TourFinderByProperty($repository);
        $id = PropertyIdMother::random();
        $repository->expects($this->once())->method("searchToursByProperty")->with($id);
        $finder->__invoke($id);
    }

    /** @test */
    public function it_should_find_tours_for_the_given_property_id(): void
    {
        $property = PropertyMother::random();

        $tours = ToursMother::createWithId($property->id());

        $repository = $this->createMock(TourRepository::class);
        $repository->expects($this->once())->method("searchToursByProperty")->with($property->id())->willReturn($tours);

        $finder = new TourFinderByProperty($repository);
        $toursFromRepository = $finder->__invoke($property->id());

        $this->assertEquals($toursFromRepository->tours(), $tours->items());
    }
}
