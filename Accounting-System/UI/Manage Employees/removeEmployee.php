<?php
require_once '../db_Connect.php';

function deleteEmployee($employeeNo): void
{
    $pdo = db_connect();

    $sql = "DELETE FROM Employees WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    $result->bindValue(':employeeNo', $employeeNo);
    $result->execute();

    $pdo = null;
}

if(isset($_POST['employeeData'])) {
    $employeeNo = $_POST['employeeData'];
    deleteEmployee($employeeNo);
    $response = array('success' => true);
} else {
    $response = array('success' => false);
}
echo json_encode($response);