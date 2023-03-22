<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
<button id="add" class="employeeBtn">Add Employee</button>
<button id="update" class="employeeBtn">Update Employee</button>
<button id="remove" class="employeeBtn">Remove Employee</button>

<form id="addForm" action="addEmployee.php" method="post" class="employeeForm">
    <p>Add Employees</p>
    <label for="addName">Name:</label>
    <input type="text" id="addName" name="addName" required>
    <br>
    <label for="addJob">Job:</label>
    <input type="text" id="addJob" name="addJob" required>
    <br>
    <label for="addAge">Age:</label>
    <input type="text" id="addAge" name="addAge" required>
    <br>
    <label for="addSalary">Salary:</label>
    <input type="text" id="addSalary" name="addSalary" required>
    <br>
    <input type='button' class='back' value='Back'>
    <button type="submit" name="addSubmit">Add</button>
</form>

<?php include 'updateEmployee.php'; ?>
<form id="updForm" action="updateEmployee.php" method="post" class="employeeForm">
    <p>Update Employees</p>
    <label for="employeeNo">Select employee No</label>
    <select id="employeeNo" name="employeeNo">
        <option disabled="disabled" selected="selected" style="display:none;" value="">Choose an Employee Number</option>
        <?php getEmployeeNo(); ?>
    </select>
    <div id="updEmployeeContents" style="display: none">
    </div>
    <input type='button' class='back' value='Back'>
    <button type='submit' name='updSubmit'>Update</button>
</form>

<?php include 'removeEmployee.php'; ?>
<form id="rmvForm" action="removeEmployee.php" method="post" class="employeeForm">
    <p>Remove Employee</p>
    <table>
        <tr><th>Employee No</th><th>Employee Name</th><th>Job</th><th>Age</th><th>Salary</th><th>Choose</th></tr>
        <?php getAllEmployees();?>
    </table>
    <input type='button' class='back' value='Back'>
</form>
<script src="../formShow.js"></script>
</body>
</html>