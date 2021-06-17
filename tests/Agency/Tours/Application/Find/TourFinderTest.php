<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Find;

use Floorfy\Agency\Tours\Application\Find\TourFinder;
use Floorfy\Agency\Tours\Domain\TourNotExist;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Tests\Agency\Tours\Domain\TourIdMother;
use Tests\Agency\Tours\Domain\TourMother;
use Tests\TestCase;

final class TourFinderTest extends TestCase
{
    /** @test */
    public function it_should_throw_an_exception_when_the_tour_not_exist(): void
    {
        $this->expectException(TourNotExist::class);

        $repository = $this->createMock(TourRepository::class);
        $finder = new TourFinder($repository);
        $id = TourIdMother::random();
        $repository->expects($this->once())->method("search")->with($id);
        $finder->__invoke($id);
    }

    /** @test */
    public function it_should_find_an_existing_tour(): void
    {
        $tour = TourMother::random();

        $repository = $this->createMock(TourRepository::class);
        $repository->expects($this->once())->method("search")->with($tour->id())->willReturn($tour);

        $finder = new TourFinder($repository);
        $tourFromRepository = $finder->__invoke($tour->id());

        $this->assertEquals($tourFromRepository, $tour);
    }
}
