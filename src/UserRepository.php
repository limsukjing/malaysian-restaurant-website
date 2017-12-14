<?php

namespace Itb;

use Itb\User;

class UserRepository
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function dropTable()
    {
        $sql = 'DROP TABLE IF EXISTS user';
        $this->connection->exec($sql);
    }

    public function createTable()
    {
        $this->dropTable();

        $sql = 'CREATE TABLE IF NOT EXISTS user(id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                username VARCHAR(25),
                                                email VARCHAR(255), 
                                                password VARCHAR(255)                                   
                                                )';
        $this->connection->exec($sql);
    }

    public function insert($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO user(username, email, password)
                VALUES(:username, :email, :password)';
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        $stmt->execute();
    }

    public function getAll()
    {
        $sql = 'SELECT * 
                FROM user';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\User');

        $user = $stmt->fetchAll();

        return $user;
    }

    public function getOne($id)
    {
        $sql = 'SELECT * 
                FROM user
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\User');

        $user = $stmt->fetch();

        return $user;
    }

    public function update($id, $username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'UPDATE user
                SET username = :username, email = :email, password = :password
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        $noError = $stmt->execute();

        return $noError;
    }

    public function deleteAll()
    {
        $sql = 'DELETE * 
                FROM user';
        $stmt = $this->connection->exec($sql);
    }

    public function deleteOne($id)
    {
        $sql = 'DELETE FROM user
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);

        $noError = $stmt->execute();

        return $noError;
    }
}
