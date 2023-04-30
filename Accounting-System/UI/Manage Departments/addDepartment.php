<?php
require_once '../db_Connect.php';


if(isset($_POST['addDeptSubmit'])) {
    $name = $_POST['addDeptName'];
    $description = $_POST['addDeptDesc'];
    $balance = $_POST['addDeptBal'];
    $error_msg = '';

    if(validateName($name) != "Input correct"){
        $error_msg .= validateName($name);
    }

    if(empty($description)){
        $error_msg .= "Description must not be blank!";
    }

    if(!is_numeric($balance)) {
        $error_msg .= 'Balance must be a number';
    }
    else if($balance < 10000){
        $error_msg .= "Balance must be more than 10000";
    }

    if(empty($error_msg)) {
        $pdo = db_connect();

        $sql = "INSERT INTO departments (dept_Name, dept_Desc, dept_Bal) VALUES (?,?,?)";

        $stmt = $pdo->prepare($sql);

        $values = array($name, $description, $balance);

        $stmt->execute($values);

        $data = nl2br("Department name: " . $name . "\\nDepartment description: " . $description .
            "\\nDepartment balance: " . $balance . "\\nSuccessfully added to database!!!");

        echo "<script>console.log('$data'); window.location.href = 'Department.php';</script>";
    }
    else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}