<?php
class Database
{
    private $databaseHostName = 'localhost';
    private $databaseUserName = 'root';
    private $databasePassword = 'rishabh';
    private $databaseName = 'application-programming-interface';

    public function __construct()
    {
        $connection = new mysqli($this->databaseHostName, $this->databaseUserName, $this->databasePassword, $this->databaseName);
        if (empty($connection)) {
            echo mysqli_error();
            exit();
        }
    }

}