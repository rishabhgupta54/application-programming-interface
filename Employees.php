<?php
require_once './Database.php';

class Employees extends Database
{
    private $firstName;
    private $lastName;
    private $designation;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->firstName[] = $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($lastName)
    {
        $this->lastName[] = $lastName;
    }


    public function getDesignation()
    {
        return $this->designation;
    }


    public function setDesignation($designation)
    {
        $this->designation[] = $designation;
    }

    public function getEmployees()
    {
        $getEmployeeQuery = 'SELECT * FROM employees';
        $result = $this->connection->query($getEmployeeQuery);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
               $this->setFirstName($row->firstName);
               $this->setLastName($row->lastName);
               $this->setDesignation($row->designation);
            }
        }
    }

}