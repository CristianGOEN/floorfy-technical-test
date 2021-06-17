<?php

declare(strict_types=1);

namespace Tests\Agency\Tours\Infrastructure;

use Floorfy\Agency\Properties\Domain\Property;
use Floorfy\Agency\Properties\Infrastructure\EloquentPropertyRepository;
use Floorfy\Agency\Tours\Infrastructure\EloquentTourRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\Agency\Tours\Domain\TourIdMother;
use Tests\Agency\Tours\Domain\TourMother;
use Tests\TestCase;

final class EloquentTourRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    private Property $property;

    protected function setUp(): void
    {
        parent::setUp();

        $repository = new EloquentPropertyRepository();
        $this->property = PropertyMother::random();

        $repository->save($this->property);
    }

    /** @test */
    public function it_should_save_a_tour(): void
    {
        $repository = new EloquentTourRepository();
        $tour = TourMother::createWithId($this->property->id());

        $repository->save($tour);
    }

    /** @test */
    public function it_should_return_an_existing_tour(): void
    {
        $repository = new EloquentTourRepository();
        $tour = TourMother::createWithId($this->property->id());

        $repository->save($tour);

        $this->assertEquals($tour, $repository->search($tour->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_tour(): void
    {
        $repository = new EloquentTourRepository();

        $this->assertNull($repository->search(TourIdMother::random()));
    }
}
