<?php
require_once '../db_Connect.php';
function getAllEmployees(): void
{
    $pdo = db_connect();

    $sql = "SELECT * FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo '<tr><td id="rmvEmpNo">'.$row['employee_NO'].'</td><td>'.$row['employee_Name'].'</td><td>'.
            $row['Job'].'</td><td>'.$row['Age'].'</td><td>'.$row['Salary'].'</td><td>'.
            '<input type="hidden" name="employeeNo" value="'.$row['employee_NO'].'">'.
            "<button type='submit' name='rmvSubmit' class='delete-btn'>Delete</button></td></tr>";
    }

    $pdo = null;
}

if(isset($_POST['rmvSubmit'])){
    $employeeNo = $_POST['employeeNo'];
    echo json_encode($employeeNo);
    $pdo = db_connect();

    $sql = "DELETE FROM Employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    $result->bindValue(':employeeNo',$employeeNo);
    $result->execute();
}



