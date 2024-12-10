<?php

class PotionRepository
{
    private readonly DAO $dao;

    public function __construct(DAO $dao)
    {
        $this->dao = $dao;
    }

    public function get(): mixed
    {
        return  array_map('Potion::toPotion', $this->dao->get());
    }

    public function add(string $name, string $type, string $color): void
    {
        $this->dao->add(new Potion($name, $type, $color));
    }

    public function delete(int $id): void
    {
        $this->dao->delete($id);
    }
}
