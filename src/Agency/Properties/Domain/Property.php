<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Domain;

use Floorfy\Shared\Domain\Properties\PropertyId;

final class Property
{
    public function __construct(private PropertyId $id, private PropertyTitle $title, private PropertyDescription $description)
    {
    }

    public static function create(PropertyId $id, PropertyTitle $title, PropertyDescription $description): self
    {
        return new self($id, $title, $description);
    }

    public function id(): PropertyId
    {
        return $this->id;
    }

    public function title(): PropertyTitle
    {
        return $this->title;
    }

    public function description(): PropertyDescription
    {
        return $this->description;
    }

    public function update(PropertyTitle $title, PropertyDescription $description): void
    {
        $this->title = $title;
        $this->description = $description;
    }
}
