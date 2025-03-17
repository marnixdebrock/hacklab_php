<?php
namespace Marnix\BookManagementSystem\services;

use Marnix\BookManagementSystem\models\Item;
use PDOStatement;

class QueryBuilder
{
    private string $table;

    private string $className;
    private PdoService $pdoService;


    public function __construct(string $className, ?string $table = null)
    {
        $this->pdoService = PdoService::getInstance();
        $this->className = $className;
        $this->table = $table ?? strtolower($className) . 's';
    }

    public function get(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;
        return $this->pdoService->query($sql);
    }


    public function add(Item $item): void
    {
        $data = $item->toArray();
        $keys = array_keys($data);
        $sql = "INSERT INTO " . $this->table . " (" . implode(', ', $keys) . ") values(:" . implode(', :', $keys) . ")";

        $this->pdoService->executeTransaction($sql, $data);

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

    private function checkError(object $pdoService, string $succesMessage, string $errorMessage): void
    {
        if ($pdoService->error == '')
        {
            echo $succesMessage;
        }else
        {
            echo $errorMessage;
        }
    }
}
