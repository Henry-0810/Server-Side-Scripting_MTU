<?php
include 'db_Connect.php';

if(isset($_POST['addSubmit'])){
        $name = $_POST['addName'];
        $job = $_POST['addJob'];
        $age = $_POST['addAge'];
        $salary = $_POST['addSalary'];
        $error_msg = '';

        if(!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $error_msg .= "Invalid Name";
        }
        if($age < 18 || $age > 65) {
            $error_msg .= "Age should be between 18 and 65";
        }
        if($salary < 3500) {
            $error_msg .= "Salary should be greater than 3500";
        }

        if(empty($error_msg)) {

            $pdo = db_connect();

            $sql = "INSERT INTO employee (employee_Name,Job, Age, Salary) VALUES(:name, :job, :age, :salary)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':job', $job);
            $stmt->bindValue(':age', $age);
            $stmt->bindValue(':salary', $salary);

            $stmt->execute();

            $data = nl2br("Employee name: ".$name."\\nJob: ".$job."\\nAge: ".$age."\\nSalary: ".$salary.
                "\\nSuccessfully added to database!!!");

            echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
        }
        else{
            echo "<script>alert('$error_msg'); window.history.back(); </script>";
        }
    }