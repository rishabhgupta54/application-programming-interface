<?php
require_once '../Config/Database.php';

class Employees extends Database
{
    private $id;
    private $firstName;
    private $lastName;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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
                $employees['employees'][$i]['id'] = $row->id;
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

    public function updateEmplyee()
    {
        if (empty($this->getId())) {
            return 0;
        }

        $updateParameters = array();
        if (!empty($this->getFirstName())) {
            $updateParameters[] = 'firstName="' . $this->getFirstName() . '"';
        }

        if (!empty($this->getLastName())) {
            $updateParameters[] = 'lastName="' . $this->getLastName() . '"';
        }

        if (!empty($this->getDesignation())) {
            $updateParameters[] = 'designation="' . $this->getDesignation() . '"';
        }

        $updateParameters = implode(', ', $updateParameters);
        $updateEmployeeQuery = 'UPDATE employees SET ' . $updateParameters . ' WHERE id=' . $this->getId();
        $updateResults = $this->connection->query($updateEmployeeQuery) ? 1 : $this->connection->error;
        return json_encode($updateResults);
    }

    public function deleteEmployee()
    {
        if (empty($this->getId())) {
            return 0;
        }

        $deleteEmployeeQuery = 'DELETE FROM employees WHERE id=' . $this->getId();
        $deleteEmployee = $this->connection->query($deleteEmployeeQuery) ? 1 : $this->connection->error;
        return json_encode($deleteEmployee);
    }

}