<?php


class Database{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;
    public $connection;
    
    
    public function __construct(){
        $this->host = 'localhost';
        $this->db_name = 'test';
        $this->username = 'root';
        $this->password = 'root';
        $this->port = 5432;   
    }


    public function getConnection(){
        $this->connection = null;

        try{
            $this->connection = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->db_name;user=$this->username;password=$this->username");
            $this->connection->exec('set names utf8');
        } catch(PDOException $exception) {
            echo $exception->getMessage();
        }
        return $this->connection;
    }

}
