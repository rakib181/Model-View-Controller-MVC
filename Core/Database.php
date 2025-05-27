<?php

namespace Core;
use PDO;
use PDOException;
class Database
{
    public $statement;
    public PDO $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        try{
            $dsn = "mysql:".http_build_query($config, '', ';');
            $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public function query($query, $params = []): static
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function findOrFail(){
        $result = $this->statement->fetch();
        if(empty($result)){
            abort();
        }
        return $result;
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function all(){
        return $this->statement->fetchAll();
    }

}