<?php
include 'db_Connect.php';
function getEmployeeNo(): void
{
    $pdo = db_Connect();
    $sql = "SELECT employee_NO, employee_Name FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "<option value='" . $row["employee_NO"] . "'>" . $row["employee_NO"] . " - " .
            $row["employee_Name"] . "</option>";
    }

    $pdo = null;
}

function getEmployeeInfo($employeeNo)
{
    $pdo = db_connect();
    $sql = "SELECT Job, Age, Salary FROM employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    $result->bindValue(':employeeNo', $employeeNo);
    $result->execute();

    return $result->fetch(PDO::FETCH_ASSOC);
}




