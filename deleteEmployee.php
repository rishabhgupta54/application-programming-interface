<?php
header('Content-Type: application/json');
require_once './Employees/Employees.php';
require_once './Permission/Permission.php';

$postData = json_decode(file_get_contents('php://input'));
$authentication = getallheaders()['authentication'];
$permission = new Permission();
$permission->setAuthentication($authentication);
if ($permission->validateAuthentication() !== false) {
    echo json_encode('{"error" : "Invalid Authentication"}');
    die();
}
$employees = new Employees();
$employees->setId($postData->id);
echo $employees->deleteEmployee();