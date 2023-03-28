<?php
require_once '../db_Connect.php';

function getDepartmentName(): void
{
    $pdo = db_connect();

    $sql = "SELECT dept_Name FROM departments";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row){
        echo "<option value='" . $row['deptName'] . "'>" . $row['deptName'] . "</option>";
    }

    $pdo = null;
}

if(isset($_POST['addEmpSubmit'])) {
    $name = $_POST['addEmpName'];
    $job = $_POST['addEmpJob'];
    $age = $_POST['addEmpAge'];
    $salary = $_POST['addEmpSalary'];
    $error_msg = '';

    if (validateName($name) != "Input correct") {
        $error_msg .= validateName($name);
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
      echo $data;
        echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}