<?php

namespace Itb;

class User
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = User::getOneByUsername($username);

        if(null == $user){
            return false;
        }

        $hashedStoredPassword = $user->getPassword();

        return password_verify($password, $hashedStoredPassword);
    }

    public static function getOneByUsername($username)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $sql = 'SELECT * 
                FROM user 
                WHERE username=:username';

        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch())
        {
            return $object;
        }

        else
        {
            return null;
        }
    }
}