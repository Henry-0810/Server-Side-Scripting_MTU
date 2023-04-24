<?php
require_once '../db_Connect.php';
include_once '../Manage Departments/updateDepartment.php';

$pdo = db_connect();

$sql = "SELECT * FROM employee";

$stmt = $pdo->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    $deptID = $row['dept_ID'];
    echo '<tr><td data-id="employee_NO">'.$row['employee_NO'].'</td><td>'.$row['employee_Name'].'</td><td>'.
        $row['Job'].'</td><td>'.$row['Age'].'</td><td>€'.$row['Salary'].'</td><td>'.getDeptName($deptID).'</td><td>'.
        "<button type='button' name='updBtn' class='table-btn' data-id='".$row['employee_NO']."'>Update</button>".
        "<button type='button' name='rmvBtn' class='table-btn' data-id='".$row['employee_NO']."'>Delete</button></td></tr>";
}

$pdo = null;