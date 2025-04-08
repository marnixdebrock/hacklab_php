<?php
namespace Marnix\BookManagementSystem\services;

use \PDO;
use \PDOException;
class PdoService
{
    private string $error = '';
    private string $dbname = 'library_system';
    private string $username = 'root';
    private string $password = 'password';
    private string $host = 'db:3306';
    private PDO $pdo;
    private static PdoService $pdoService;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }


    public static function getInstance(): PdoService
    {
        if(!isset(self::$pdoService))
        {
            self::$pdoService = new PdoService();
        }
        return self::$pdoService;
    }

    public function query($sql, $data = null): array|string
    {
        try
        {
            if ($this->error != '')
            {
                return $this->error;
            }

            $stmt = $this->pdo->prepare($sql);

            if (!empty($data))
            {
                foreach ($data as $key => &$val) {
                    $stmt->bindParam($key, $val);
                }
            }

            $stmt->execute();
            $response = [];

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false)
            {
                $response[] = $row;
            }

            $pdo = null;

            return $response;
        } catch (PDOException $e)
        {
            $this->error = $e->getMessage();
            return [];
        }
    }

    public function executeTransaction($sql, $data): int
    {
        try {
            if ($this->error != '') {
                return $this->error;
            }
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($data);
                return $this->pdo->lastInsertId();
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
        return 0;
    }

    public function getError(): string
    {
        return $this->error;
    }

}
