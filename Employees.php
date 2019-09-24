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
        $this->firstName = $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    public function getDesignation()
    {
        return $this->designation;
    }


    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function getEmployees()
    {
        $getEmployeeQuery = 'SELECT * FROM employees';
        $result = $this->connection->query($getEmployeeQuery);
        $employees = array();
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_object()) {
                $employees['employees'][$i]['firstName'] = $row->firstName;
                $employees['employees'][$i]['lastName'] = $row->lastName;
                $employees['employees'][$i]['designation'] = $row->designation;
                $i++;
            }
        }
        return json_encode($employees);
    }

    public function newEmployee()
    {
        if (empty($this->getFirstName()) || $this->getLastName()) {
            return 0;
        }
        $newEmployeeQuery = 'INSERT INTO employees SET firstName="' . $this->getFirstName() . '", lastName="' . $this->getLastName() . '", designation="' . $this->getDesignation() . '"';
        $newEmployee = $this->connection->query($newEmployeeQuery) ? 1 : $this->connection->error;
        return json_encode($newEmployee);
    }
}