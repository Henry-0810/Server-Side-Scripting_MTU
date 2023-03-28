<?php
require_once '../db_Connect.php';

if(isset($_POST['addDeptSubmit'])){
    $name = $_POST['addDeptName'];
    $description = $_POST['addDeptDesc'];
    $balance = $_POST['addDeptBal'];
    $error_msg = '';

    if(validateName($name) != "Input correct"){
        $error_msg .= validateName($name);
    }

    if(empty($description)){
        $error_msg .= 'Description cannot be blank!';
    }

    if(!is_numeric($balance)) {
        $error_msg .= 'Balance must be a number';
    }

    if(empty($error_msg)){

        $pdo = db_connect();

        $sql = "INSERT INTO departments (dept_Name, dept_Desc, dept_Bal) VALUES (?,?,?)";

        $stmt = $pdo->prepare($sql);

        $balance = round($balance,2);

        $values = array($name,$description,$balance);

        $stmt->execute($values);

        $data = nl2br("Department name: " . $name . "\\nDepartment Description: " . $description . "\\nInitial Balance: " . $balance .
            "\\nSuccessfully added to database!!!");
        echo $data;
        echo "<script>alert('$data'); </script>";
    }
    else{
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}

