<?php
header('Content-Type: application/json');
require_once './Employees.php';
$employees = new Employees();
echo $employees->getEmployees();
$employees->newEmployee();

