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
        $this->password = $options['password'] ?? getenv('DB_PASSWORD');
        $this->dbName = $options['dbName'] ?? getenv('DB_NAME');
    }

    public function connect(): \PDO
    {
        return new \PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->userName, $this->password);
    }

}