<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Create;

use Floorfy\Agency\Properties\Application\Find\PropertyFinder;
use Floorfy\Agency\Properties\Domain\PropertyNotExist;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Tours\Application\Create\TourCreator;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\Agency\Tours\Domain\TourIdMother;
use Tests\Agency\Tours\Domain\TourMother;
use Tests\Shared\BoolMother;
use Tests\TestCase;

final class TourCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_tour(): void
    {
        $this->withoutExceptionHandling();
        $tourRepository = $this->createMock(TourRepository::class);
        $propertyRepository = $this->createMock(PropertyRepository::class);
        $creator = new TourCreator($tourRepository, $propertyRepository);

        $property = PropertyMother::random();

        $request = CreateTourRequestMother::create(TourIdMother::random(), $property->id(), BoolMother::random());

        $tour = TourMother::createFromRequest($request);

        $propertyRepository->expects($this->once())->method("search")->with($tour->propertyId())->willReturn($property);
        $tourRepository->expects($this->once())->method("save")->with($tour);
        $creator->__invoke($request);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_property_associated_to_tour_not_exist(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(PropertyNotExist::class);

        $tourRepository = $this->createMock(TourRepository::class);
        $propertyRepository = $this->createMock(PropertyRepository::class);
        $creator = new TourCreator($tourRepository, $propertyRepository);

        $request = CreateTourRequestMother::random();

        $tour = TourMother::createFromRequest($request);

        $propertyRepository->expects($this->once())->method("search")->with($tour->propertyId());

        $creator->__invoke($request);
    }
}
