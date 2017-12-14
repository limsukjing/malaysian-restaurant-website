<?php

namespace Itb;

class MenuRepository
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function dropTable()
    {
        $sql = 'DROP TABLE IF EXISTS menu';
        $this->connection->exec($sql);
    }

    public function createTable()
    {
        $this->dropTable();

        $sql = 'CREATE TABLE IF NOT EXISTS menu(id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                name VARCHAR(25),
                                                price FLOAT,
                                                description VARCHAR(255)
                                                )';
        $this->connection->exec($sql);
    }

    public function insert($name, $price, $description)
    {
        $sql = 'INSERT INTO menu(name, price, description)
                VALUES(:name, :price, :description)';
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);

        $stmt->execute();
    }

    public function getAll()
    {
        $sql = 'SELECT * 
                FROM menu';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Menu');

        $menu = $stmt->fetchAll();

        return $menu;
    }

    public function getOne($id)
    {
        $sql = 'SELECT * 
                FROM menu 
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Menu');

        $item = $stmt->fetch();

        return $item;
    }

    public function update($id, $name, $price, $description)
    {
        $sql = 'UPDATE menu
                SET name = :name, price = :price, description = :description
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);

        $noError = $stmt->execute();

        return $noError;
    }

    public function deleteAll()
    {
        $sql = 'DELETE * 
                FROM menu';
        $stmt = $this->connection->exec($sql);
    }

    public function deleteOne($id)
    {
        $sql = 'DELETE FROM menu 
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);

        $noError = $stmt->execute();

        return $noError;
    }
}
