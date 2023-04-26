<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../Design/style.css">
</head>
<body>
<div id="overlay"></div>
<?php include '../Design/navigationBar.php'; ?>
<form id="showLedgerForm" class="ledgerTable" style="display: block">
    <p>Ledger details</p>
    <button type="button" class="ledgerBtn" id="addLedger">Add Ledger</button>
    <input class="searchBar" type="text" id="userInput" placeholder="Search for desired keyword...">
    <table>
        <tr><th>Ledger ID</th><th>Name</th><th>Created On</th><th>Department ID</th><th>Amount</th><th>Transaction Type</th><th>Edit</th></tr>
        <?php include_once 'showLedgerDetails.php';?>
    </table>
</form>

<div class="emp-container">
    <form id="addLedgerForm" action="addLedger.php" method="post" class="ledgerForm">
        <div class="formContents">
            <p>Add Ledger</p>
            <label for="addLedgerName">Department Name:</label>
            <input type="text" id="addLedgerName" name="addLedgerName" required>
            <label for="ledgerDate">Created On:</label>
            <input type="date" id="ledgerDate" name="createdOn" required><br>
            <label for="deptNo">Select department id:</label>
            <select id="deptNo" name="deptNo" style="width: 300px;">
                <option disabled="disabled" selected="selected" style="display:none;" value="">Choose a Department Number</option>
                <?php include_once '../Manage Departments/updateDepartment.php'; getDeptDetails();?>
            </select>
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" value="0.00">
            <label class="transactionTypeLabel">Transaction Type:</label>
            <div style="display: flex;">
                <label for="debit" class="debtCredOption">Debit</label>
                <input type="radio" id="debit" name="debtCredOption" value="D">
                <label for="credit" class="debtCredOption">Credit</label>
                <input type="radio" id="credit" name="debtCredOption" value="C">
            </div>
            <input type='button' class='ledgerBack' value='Back'>
            <button type="submit" name="addLedgerSubmit">Add</button>
        </div>
    </form>
</div>

<div class="emp-container">
    <form id="updLedgerForm" action="updateLedger.php" method="post" class="ledgerForm">
        <div class="formContents">
            <p>Selected Ledger details</p>
            <div id="updLedgerContents" style="display: none">
            </div>
            <input type='button' class='ledgerBack' value='Back'>
            <button type='submit' name='updLedgerSubmit'>Update</button>
        </div>
    </form>
</div>
<script src="../formShow.js"></script>
</body>
</html>