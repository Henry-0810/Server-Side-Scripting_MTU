<?php
include '../db_Connect.php';
function getEmployeeNo(): void
{
    $pdo = db_Connect();
    $sql = "SELECT employee_NO, employee_Name FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "<option value='" . $row["employee_NO"] . "'>" . $row["employee_NO"] . " - " .
            $row["employee_Name"] . "</option>";
    }

    $pdo = null;
}

function getEmployeeInfo($employeeNo): void
{
    $pdo = db_connect();
    $sql = "SELECT * FROM employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    if(isset($employeeNo)){
        $result->bindValue(':employeeNo', $employeeNo);
        $result->execute();
    }

    while($row = $result->fetch()){
        echo "<label for='updJob'>Job:</label>". "<input type='text' id='updJob' name='updJob' value ='".$row['Job']."' required><br>".
            "<label for='updAge'>Age:</label>"."<input type='text' id='updAge' name='updAge' value = '".$row['Age']."' required><br>".
            "<label for='updSalary'>Salary:</label>"."<input type='text' id='updSalary' name='updSalary'' value = '".$row['Salary']."' required><br>".
            "<button class='back'>Back</button>"."<button type='submit' name='updSubmit'>Update</button>";
    }
 }




