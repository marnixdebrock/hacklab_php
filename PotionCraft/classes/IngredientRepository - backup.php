<?php

class IngredientRepository{
    private array $potions = [];


    public function __construct(){
    }


    public function get(): array|string{
        $database = new Database();
        $sql = 'SELECT * FROM ingredients';
        return $response = $database->query($sql);
    }

    public function add(string $name, string $color, string $quantity): void{
        $database = new Database;
        $sql = "INSERT INTO ingredients (name,color,quantity) values(:name, :color, :quantity)";
        $data = [
                'name'=> $name,
                'color'=> $color,
                'quantity'=> $quantity];

        $database->executeTransaction($sql, $data);

        $this->checkError($database, 'Ingredient added', 'Ingredient failed to add');
    }


    public function delete(int $id):void{
        $database = new Database;
        $sql = "DELETE FROM ingredients WHERE id = $id";
        $database->executeTransaction($sql, null);

        $this->checkError($database, 'Potion deleted', 'Failed to delete potion');
    }

    private function checkError(object $database, string $successMessage, string $errorMessage){
        if ($database->error == ''){
            echo $successMessage;
        }else{
            echo $errorMessage . ': ' . $database->error;
        }
    }
}
