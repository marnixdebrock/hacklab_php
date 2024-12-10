<?php

class IngredientRepository
{
    private readonly DAO $dao;

    public function __construct(DAO $dao)
    {
        $this->dao = $dao;
    }

    public function get(): mixed
    {
        return $this->dao->get();
    }

    public function add(string $name, string $color, int $quantity): void
    {
        $this->dao->add(new Ingredient($name, $color, $quantity));
    }

    public function delete(int $id): void {}
}
