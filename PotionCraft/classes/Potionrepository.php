<?php

class PotionRepository{
    public array $potions = [];


    public function __construct(){
    }

    public function addPotion(Potion ...$potions): void{
        $this->potions = array_merge($this->potions, $potions);
    }


    public function deletePotion(string $name):void{
        $potion = $this->getIndexByName($name);
        unset($this->potions[$potion]);
    }

    private function getIndexByName(string $name){
        foreach($this->potions as $index => $potion){
            if ($potion->name == $name){
                return $index;
            }
        }
    }
}