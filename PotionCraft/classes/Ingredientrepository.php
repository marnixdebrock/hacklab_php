<?php

class IngredientRepository{
    public array $ingredients = [];


    public function __construct(){
        if(isset($_SESSION['ingredients'])){
            $this->ingredients = $_SESSION['ingredients'];
        }else{
            $_SESSION['ingredients'] = [];
        }

    }

    public function addIngredient(Ingredient ...$ingredients):void{
        $this->ingredients = array_merge($this->ingredients, $ingredients);

        $this->save();
    }

    public function deleteIngredient(string $name):void{
        $ingredient = $this->getIndexByName($name);
        unset($this->ingredients[$ingredient]);

        $this->save();
    }

    private function getIndexByName(string $name){
        foreach($this->ingredients as $index => $ingredient){
            if ($ingredient->name == $name){
                return $index;
            }
        }
    }

    private function save(): void{
        $_SESSION['ingredients'] = $this->ingredients;
    }
}