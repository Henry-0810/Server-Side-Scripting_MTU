<?php
require_once '../db_Connect.php';

if(isset($_POST['addLedgerSubmit'])) {
    $name = $_POST['addLedgerName'];
    $date = $_POST['createdOn'];
    $deptID = $_POST['deptNo'];
    $amount = $_POST['amount'];
    $transaction = $_POST['debtCredOption'];
    $error_msg = '';

//    if($date)
//
//    if(!isset($_POST['departmentDetails'])){
//        $error_msg .= "Department not selected!";
//    }
//
//    if (empty($error_msg)) {
//
//        $pdo = db_connect();
//
//        $sql = "INSERT INTO employee (employee_Name,Job, Age, Salary, dept_ID) VALUES(?, ?, ?, ?, ?)";
//
//        $stmt = $pdo->prepare($sql);
//
//        $values = array($name, $job, $age, $salary, $deptID);
//
//        $stmt->execute($values);
//
//        $data = nl2br("Employee name: " . $name . "\\nJob: " . $job . "\\nAge: " . $age . "\\nSalary: " . $salary .
//            "\\nDepartment ID: " . $deptID . "\\nSuccessfully added to database!!!");
//        echo $data;
//        echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
//    } else {
//        echo "<script>alert('$error_msg'); window.history.back(); </script>";
//    }
}
