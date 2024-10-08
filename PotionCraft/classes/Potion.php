<?php

class Potion{
        
    public array $ingredients = [];
    public string $name;
    public string $type;
    public string $color;

    function __construct(string $name, string $type, string $color){
        $this->name = $name;
        $this->type = $type;
        $this->color = $color;
    }

    public function addIngredient(Ingredient ...$ingredients):void{
       $this->ingredients = array_merge($this->ingredients, $ingredients);
    }

    public function deleteIngredient(string $name): void{
        foreach($this->ingredients as $index => $ingredient){
            if ($ingredient->name == $name){
                unset($this->ingredients[$index]);
            }
        }
    }

} 
