<?php

class Database
{
    public $error = '';

    private function connect(): PDO
    {
        try {
            $dbname = 'potioncraft';
            $username = 'root';
            $password = '';
            $host = 'localhost';

            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }




    public function query($sql, $data = null): array|string
    {
        try {
            $pdo = $this->connect();

            if ($this->error != '') {
                return $this->error;
            }

            $stmt = $pdo->prepare($sql);

            if (!empty($data)) {
                foreach ($data as $key => &$val) {
                    $stmt->bindParam($key, $val);
                }
            }

            $stmt->execute();
            $response = [];

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $response[] = $row;
            }

            $pdo = null;

            return $response;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return [];
        }
    }


    public function executeTransaction($sql, $data)
    {
        try {
            $pdo = $this->connect();

            if ($this->error != '') {
                return $this->error;
            }
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
