<?php

class MysqlDAO implements DAO
{
    private readonly Database $database;
    private readonly string $table;


    public function __construct(string $table)
    {
        $this->database = new Database;
        $this->table = $table;
    }

    public function get(): array|string
    {
        $sql = 'SELECT * FROM ' . $this->table;
        return $this->database->query($sql);
    }

    public function add(Item $item): void
    {
        $database = $this->database;
        $data = $item->toArray();
        $keys = array_keys($data);
        $sql = "INSERT INTO " . $this->table . " (" . implode(', ', $keys) . ") values(:" . implode(', :', $keys) . ")";

        $database->executeTransaction($sql, $data);

        $this->checkError($database, 'item added to ' . $this->table,  $this->table .  'failed to add');
    }

    public function delete(int $id): void
    {
        $database = $this->database;
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id =' . $id;

        $database->executeTransaction($sql, null);

        $this->checkError($database, 'Potion deleted', 'Failed to delete potion');
    }

    private function checkError(object $database, string $successMessage, string $errorMessage): void
    {
        if ($database->error == '') {
            echo $successMessage;
        } else {
            echo $errorMessage . ': ' . $database->error;
        }
    }
}
