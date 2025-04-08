<?php
namespace Marnix\BookManagementSystem\repositories;
use Marnix\BookManagementSystem\models\Magazine;
use Marnix\BookManagementSystem\services\QueryBuilder;


class MagazineRepository
{

    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder('magazines');
    }

    public function add(Magazine $magazine): void
    {
        $this->queryBuilder->add($magazine);
    }

    public function get(int $id): Magazine
    {
        return Magazine::fromArray($this->queryBuilder->get($id)[0]);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function getAll(): array
    {
        return $this->toMagazines(($this->queryBuilder->getAll()));
    }

    public function delete(int $id): void
    {
        $this->queryBuilder->delete($id);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function toMagazines($magazines): array
    {
        if($magazines == [])
        {
            echo 'No Magazines in Catalog';
            return $data[] = [];
        }else{
            foreach ($magazines as $magazine)
            {
                $data[] = Magazine::fromArray($magazine);
            }
            return $data;
        }
    }
}

