<?php

class Potion extends Item
{
    private int $id;
    private string $name;
    private string $type;
    private string $color;

    static int $count = 0;

    public function __construct(int $id = 0, string $name, string $type, string $color)
    {
        $this->id = $id ?? ++static::$count;
        $this->name = $name;
        $this->type = $type;
        $this->color = $color;
    }

    public function toArray(): array
    {
        return ['name' => $this->name, 'type' => $this->type, 'color' => $this->color];
    }

    public static function toPotion(array $data): Potion
    {
        return new Potion(...$data);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName() 
    {
    }

    public function getType() {}

    public function getColor() {}
}
