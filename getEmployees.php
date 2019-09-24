<?php
require_once './Employees/Employees.php';
$employees = new Employees();
echo $employees->getEmployees();
