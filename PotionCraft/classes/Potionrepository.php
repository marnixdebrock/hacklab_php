<?php

class PotionRepository{
    public array $potions = [];


    public function __construct(){
        if(isset($_SESSION['potions'])){
            $this->potions = $_SESSION['potions'];
        }else{
            $_SESSION['potions'] = [];
        }
    }

    public function addPotion(Potion ...$potions): void{
        $this->potions = array_merge($this->potions, $potions);

        $this->save();
    }


    public function deletePotion(string $name):void{
        $potion = $this->getIndexByName($name);
        unset($this->potions[$potion]);

        $this->save();
    }

    private function getIndexByName(string $name){
        foreach($this->potions as $index => $potion){
            if ($potion->name == $name){
                return $index;
            }
        }
    }


    private function save(): void{
        $_SESSION['potions'] = $this->potions;
    }


}