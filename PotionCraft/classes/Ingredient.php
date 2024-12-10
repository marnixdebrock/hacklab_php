<?php

class Ingredient extends Item
{
    private string $name;
    private string $color;
    private int $quantity;


    function __construct(string $name, string $color, int $quantity)
    {
        $this->name = $name;
        $this->color = $color;
        $this->quantity = $quantity;
    }

    public function toArray(): array
    {
        return ['name' => $this->name, 'color' => $this->color, 'quantity' => $this->quantity];
    }
}
