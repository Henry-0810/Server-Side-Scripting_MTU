<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../Design/style.css">
</head>
<body>
<?php include "../Design/navigationBar.php";?>
<button id="add" class="employeeBtn">Add Employee</button>

<form id="showEmpForm" class="employeeForm" style="display: block">
    <p>Employee details</p>
    <table>
        <tr><th>Employee No</th><th>Employee Name</th><th>Job</th><th>Age</th><th>Salary</th><th>Department</th><th>Choose</th></tr>
        <?php include_once 'showAllEmp.php'; ?>
    </table>
</form>

<?php include 'addEmployee.php';?>
<form id="addEmpForm" action="addEmployee.php" method="post" class="employeeForm">
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
    <select id="departmentDetails" name="departmentDetails">
        <option disabled="disabled" selected="selected" style="display:none;" value="">Select an option</option>
        <?php getDepartmentName(); ?>
    </select>
    <input type='button' class='employeeBack' value='Back'>
    <button type="submit" name="addEmpSubmit">Add</button>
</form>

<?php include 'updateEmployee.php'; ?>
<form id="updEmpForm" action="updateEmployee.php" method="post" class="employeeForm">
    <p>Selected employee details</p>
<!--    <label for="employeeNo">Select employee No</label>-->
<!--    <select id="employeeNo" name="employeeNo">-->
<!--        <option disabled="disabled" selected="selected" style="display:none;" value="">Choose an Employee Number</option>-->
<!--        --><?php //getEmployeeDetails(); ?>
<!--    </select>-->
    <div id="updEmployeeContents" style="display: none">
    </div>
    <input type='button' class='employeeBack' value='Back'>
    <button type='submit' name='updEmpSubmit'>Update</button>
</form>

<script src="../formShow.js"></script>
</body>
</html>