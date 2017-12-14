<?php

namespace Itb;

class Database
{
    const DB_NAME = 'project';
    const DB_USER = 'root';
    const DB_PASS = 'pass';
    const DB_HOST = 'localhost:3306';

    private $connection;

    public function __construct()
    {
        try
        {
            $this->connection = $this->createMysqlConnection();
        }

        catch(\Exception $e)
        {
            print $e;
        }
    }

    private function createMysqlConnection()
    {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST;
        return new \PDO($dsn, self::DB_USER, self::DB_PASS);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}