<?php

namespace Marnix\BookManagementSystem\models;

abstract class Item
{
    protected ?int $id;
    protected string $title;

    public function __construct(?int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public abstract function toArray(): array;

    public abstract function getOverviewText(): string;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


}