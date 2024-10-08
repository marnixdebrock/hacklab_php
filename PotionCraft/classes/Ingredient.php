<?php

class Ingredient{

    public string $name;
    public string $color;
    public int $quantity;


    function __construct(string $name, string $color, int $quantity){
        $this->name = $name;
        $this->color = $color;
        $this->quantity = $quantity;
    }
}