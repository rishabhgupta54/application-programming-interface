<?php
require_once './Employees/Employees.php';
require_once './Permission/Permission.php';

$authentication = getallheaders()['authentication'];
$permission = new Permission();
$permission->setAuthentication($authentication);
if ($permission->validateAuthentication() !== false) {
    echo json_encode('{"error" : "Invalid Authentication"}');
    die();
}
$employees = new Employees();
echo $employees->getEmployees();
