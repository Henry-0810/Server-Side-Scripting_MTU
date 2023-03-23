<?php
require_once '../db_Connect.php';
function getAllEmployees(): void
{
    $pdo = db_connect();

    $sql = "SELECT * FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo '<tr><td data-id="employeeNo">'.$row['employee_NO'].'</td><td>'.$row['employee_Name'].'</td><td>'.
            $row['Job'].'</td><td>'.$row['Age'].'</td><td>'.$row['Salary'].'</td><td>'.
//            '<input type="hidden" name="employeeNo" value="'.$row['employee_NO'].'">'.
            "<button type='button' name='rmvBtn' class='delete-btn'>Delete</button></td></tr>";
    }

    $pdo = null;
}

function deleteEmployee($employeeNo): void
{
    $pdo = db_connect();

    $sql = "DELETE FROM Employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    $result->bindValue(':employeeNo', $employeeNo);
    $result->execute();

    $pdo = null;
}

if(isset($_POST['employeeData'])) {
    $employeeNo = $_POST['employeeData'];
    deleteEmployee($employeeNo);
    $response = array('success' => true);
    echo json_encode($response);
}



