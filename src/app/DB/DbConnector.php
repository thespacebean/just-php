<?php

namespace App\DB;

class DbConnector
{

    private string $dbHost;
    private string $userName;
    private string $password;
    private string $dbName;

    public function __construct(protected ?array $options = null)
    {
        $this->dbHost = $options['dbHost'] ?? getenv('DB_HOST');
        $this->userName = $options['userName'] ?? getenv('DB_USER');
        // Support both DB_PASSWORD and DB_PASS env var names
        $this->password = $options['password'] ?? (getenv('DB_PASSWORD') ?: getenv('DB_PASS'));
        $this->dbName = $options['dbName'] ?? getenv('DB_NAME');
    }

    public function connect(): \PDO
    {
        $pdo = new \PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->userName, $this->password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}