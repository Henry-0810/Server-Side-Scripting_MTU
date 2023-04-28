<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../Design/style.css">
    <style>
        .formContents label {
            flex-direction: column;
        }
        .addIcon {
            background-image: url("../Design/Icons/plus.ico");
            background-repeat: no-repeat;
            background-size: contain;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<div id="overlay"></div>
<?php include "../Design/navigationBar.php";?>
<form id="showDeptForm" class="deptTable" style="display: block">
    <p>Department details</p>
    <button type="button" id="addDept" class="deptBtn"><i class="addIcon"></i> Department</button>
    <table>
        <tr><th>Department ID</th><th>Department Name</th><th>Description</th><th>Department Balance</th><th>Edit</th></tr>
        <?php require_once "showAllDept.php";?>
    </table>
</form>
<br>

<div class="emp-container">
    <form id="addDeptForm" action="addDepartment.php" method="post" class="deptForm">
        <div class="formContents">
            <p>Add Department</p>
            <label>Department Name: <input type="text" id="addDeptName" name="addDeptName" required></label>
            <label>Description: <input type="text" id="addDeptDesc" name="addDeptDesc" required></label>
            <label>Department Balance: <input type="text" id="addDeptBal" name="addDeptBal" value="0.00"><br></label>
            <input type='button' class='deptBack' value='Back'>
            <button type="submit" name="addDeptSubmit">Add</button>
        </div>
    </form>
</div>

<?php require_once 'updateDepartment.php';?>
<div class="emp-container">
    <form id="updDeptForm" action="updateDepartment.php" method="post" class="deptForm">
        <div class="formContents">
            <p>Selected Department details</p>
            <div id="updDeptContents" style="display: none">
            </div>
            <input type='button' class='deptBack' value='Back'>
            <button type='submit' name='updDeptSubmit'>Update</button>
        </div>
    </form>
</div>
<script src="department.js"></script>
</body>
</html>

