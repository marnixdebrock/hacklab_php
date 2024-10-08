<?php


class IngredientRepository{
    public array $ingredients = [];

    public function __construct(){
        // $this->ingredients = $ingredients;
    }

    public function addIngredient(Ingredient ...$ingredients):void{
        $this->ingredients = array_merge($this->ingredients, $ingredients);
    }

    public function deleteIngredient(string $name):void{
        $ingredient = $this->getIndexByName($name);
        unset($this->ingredients[$ingredient]);
    }

    private function getIndexByName(string $name){
        foreach($this->ingredients as $index => $ingredient){
            if ($ingredient->name == $name){
                return $index;
            }
        }
    }
}