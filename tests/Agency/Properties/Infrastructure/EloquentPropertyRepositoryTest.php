<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Infrastructure;

use Floorfy\Agency\Properties\Infrastructure\EloquentPropertyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\Agency\Properties\Domain\PropertyIdMother;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\TestCase;

final class EloquentPropertyRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_should_save_a_property(): void
    {
        $repository = new EloquentPropertyRepository();
        $property = PropertyMother::random();

        $repository->save($property);
    }

    /** @test */
    public function it_should_return_an_existing_property(): void
    {
        $repository = new EloquentPropertyRepository();
        $property = PropertyMother::random();

        $repository->save($property);

        $this->assertEquals($property, $repository->search($property->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_property(): void
    {
        $repository = new EloquentPropertyRepository();

        $this->assertNull($repository->search(PropertyIdMother::random()));
    }
}
