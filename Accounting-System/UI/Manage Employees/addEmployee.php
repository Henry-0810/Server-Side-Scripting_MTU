<?php
require_once '../db_Connect.php';

if(isset($_POST['addSubmit'])) {
    $name = $_POST['addEmpName'];
    $job = $_POST['addEmpJob'];
    $age = $_POST['addEmpAge'];
    $salary = $_POST['addEmpSalary'];
    $error_msg = '';

    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $error_msg .= "Invalid Name";
    }

    if (validateEmployeeInputs($age, $salary) != "All inputs correct!") {
        $error_msg .= validateEmployeeInputs($age, $salary);
    }

    if (empty($error_msg)) {

        $pdo = db_connect();

        $sql = "INSERT INTO employee (employee_Name,Job, Age, Salary) VALUES(?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $values = array($name, $job, $age, $salary);

        $stmt->execute($values);

        $data = nl2br("Employee name: " . $name . "\\nJob: " . $job . "\\nAge: " . $age . "\\nSalary: " . $salary .
            "\\nSuccessfully added to database!!!");

        echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}