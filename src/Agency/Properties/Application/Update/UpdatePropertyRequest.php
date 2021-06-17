<?php

declare(strict_types=1);

namespace Floorfy\Agency\Properties\Application\Update;

final class UpdatePropertyRequest
{
    public function __construct(private string $id, private string $title, private string $description)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }
}
