<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Application\Update;

use Floorfy\Agency\Tours\Application\Update\TourUpdater;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Tours\Domain\TourMother;
use Tests\Shared\BoolMother;
use Tests\TestCase;

final class TourUpdaterTest extends TestCase
{
    /** @test */
    public function it_should_update_an_existing_tour(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(TourRepository::class);
        $updater = new TourUpdater($repository);

        $tour = TourMother::random();

        $repository->expects($this->once())->method("search")->with($tour->id())->willReturn($tour);

        $updateTourRequest = UpdateTourRequestMother::create($tour->id(), PropertyIdMother::random(), BoolMother::random());

        $updatedTour = TourMother::updateFromRequest($updateTourRequest);

        $repository->expects($this->once())->method("update")->with($updatedTour);

        $updater->__invoke($updateTourRequest);
    }
}
