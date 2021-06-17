<?php

declare(strict_types=1);

namespace Tests\Agency\Properties\Application\Create;

use Floorfy\Agency\Properties\Application\Create\PropertyCreator;
use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Tests\Agency\Properties\Domain\PropertyMother;
use Tests\TestCase;

final class PropertyCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_property(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(PropertyRepository::class);
        $creator = new PropertyCreator($repository);

        $request = CreatePropertyRequestMother::random();

        $property = PropertyMother::createFromRequest($request);

        $repository->expects($this->once())->method("save")->with($property);
        $creator->__invoke($request);
    }
}
