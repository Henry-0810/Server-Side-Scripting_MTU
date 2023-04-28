<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../Design/style.css">
    <style>
        .addPeopleIcon {
            background-image: url("../Design/Icons/addPeople.svg");
            background-repeat: no-repeat;
            background-size: contain;
            padding-left: 25px;
        }
    </style>
</head>
<body>
<div id="overlay"></div>
<?php include "../Design/navigationBar.php";?>
<form id="showEmpForm" class="employeeForm">
    <p>Employee details</p>
    <button type="button" id="addEmployee" class="employeeBtn"><i class="addPeopleIcon" ></i>Add Employee</button>
    <table>
        <tr><th>Employee No</th><th>Employee Name</th><th>Job</th><th>Age</th><th>Salary</th><th>Department</th><th>Choose</th></tr>
        <?php include_once 'showAllEmp.php'; ?>
    </table>
</form>

<?php include 'addEmployee.php';?>
<div class="emp-container">
    <form id="addEmpForm" action="addEmployee.php" method="post" class="employeeForm">
        <div class="formContents">
            <p>Add Employees</p>
            <label for="addName">Name:</label>
            <input type="text" id="addName" name="addEmpName" required>
            <label for="addJob">Job:</label>
            <input type="text" id="addJob" name="addEmpJob" required>
            <label for="addAge">Age:</label>
            <input type="text" id="addAge" name="addEmpAge" required>
            <label for="addSalary">Salary:</label>
            <input type="text" id="addSalary" name="addEmpSalary" required>
            <label for="departmentDetails">Choose department:</label>
            <select id="departmentDetails" name="departmentDetails" style="width: 300px;">
                <option disabled="disabled" selected="selected" style="display:none;" value="">Select an option</option>
                <?php getDepartmentName(); ?>
            </select><br>
            <input type='button' class='employeeBack' value='Back'>
            <button type="submit" name="addEmpSubmit">Add</button>
        </div>
    </form>
</div>

<?php include 'updateEmployee.php'; ?>
<div class="emp-container">
    <form id="updEmpForm" action="updateEmployee.php" method="post" class="employeeForm">
        <div class="formContents">
            <p>Selected employee details</p>
            <div id="updEmployeeContents" style="display: none">
            </div>
            <input type='button' class='employeeBack' value='Back'>
            <button type='submit' name='updEmpSubmit'>Update</button>
        </div>
    </form>
</div>

<script src="employee.js"></script>
</body>
</html>