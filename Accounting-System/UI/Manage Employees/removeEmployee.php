<?php
require_once '../db_Connect.php';
function getAllEmployees(): void
{
    $pdo = db_connect();

    $sql = "SELECT * FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo '<tr><td>'.$row['employee_NO'].'</td><td>'.$row['employee_Name'].'</td><td>'.
            $row['Job'].'</td><td>'.$row['Age'].'</td><td>'.$row['Salary'].'</td><td>'.
            "<button type='submit' name='rmvSubmit' class='delete-btn'>Delete</button></td></tr>";
    }

    $pdo = null;
}

function deleteEmployee($employeeNo): void
{
    $pdo = db_connect();
    $sql = "DELETE FROM Employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    $result->bindValue(':employeeNo',$employeeNo);

    $result->execute();
    getAllEmployees();
}

if(isset($_POST['rmvSubmit'])){
    deleteEmployee();
}
