<?php
namespace Marnix\BookManagementSystem\services;
use Marnix\BookManagementSystem\models\Item;
class QueryBuilder
{
    private PdoService $pdoService;
    private string $table;


    public function __construct(string $table)
    {
        $this->pdoService = PdoService::getInstance();
        $this->table = $table;
    }

    public function getAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;
        return $this->pdoService->query($sql);
    }

    public function get(int $id): array
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ' . $id;
        return $this->pdoService->query($sql);
    }


    public function add(Item $item): void
    {

        $data = $item->toArray();
        $keys = array_keys($data);
        $sql = "INSERT INTO " . $this->table . " (" . implode(', ', $keys) . ") values(:" . implode(', :', $keys) . ")";

        $id = $this->pdoService->executeTransaction($sql, $data);
        $item->setId($id);

        $this->checkError($this->pdoService, $this->table . ' added',  $this->table . ' failed to add');
    }


    public function delete(int $id): void
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id =' . $id;
        $this->pdoService->executeTransaction($sql, null);

        $this->checkError($this->pdoService, $this->table . ' added',  $this->table . ' failed to delete');

    }

    public function update()
    {
    }

    private function checkError(object $pdoService, string $successMessage, string $errorMessage): void
    {
        if ($pdoService->getError() == '')
        {
            //echo $successMessage;
        }else
        {
            //echo $pdoService->getError();
        }
    }
}
