<?php
header('Content-Type: application/json');

class Database
{
    protected $databaseHostName = 'localhost';
    protected $databaseUserName = 'root';
    protected $databasePassword = 'rishabh';
    protected $databaseName = 'application-programming-interface';
    protected $connection;

    protected function __construct()
    {
        $this->connection = new mysqli($this->databaseHostName, $this->databaseUserName, $this->databasePassword, $this->databaseName);
        if (empty($this->connection)) {
            echo $this->connection->connect_error;
            exit();
        }
    }

}