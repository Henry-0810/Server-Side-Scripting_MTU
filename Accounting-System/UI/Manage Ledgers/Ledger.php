<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../Design/style.css">
    <style>
        .addIcon {
            background-image: url("../Design/Icons/plus.ico");
            background-repeat: no-repeat;
            background-size: contain;
            padding-left: 20px;
        }
        .addPay {
            background-image: url("../Design/Icons/payroll.svg");
            background-repeat: no-repeat;
            background-size: 22px;
            padding:4px 0 0 25px;
        }
        .addIncome {
            background-image: url("../Design/Icons/income.svg");
            background-repeat: no-repeat;
            background-size: 24px;
            padding:4px 0 0 25px;
        }
    </style>
</head>
<body>
<div id="overlay"></div>
<?php include '../Design/navigationBar.php'; ?>
<form id="showLedgerForm" class="ledgerTable" style="display: block">
    <p>Ledger details</p>
    <button type="button" class="ledgerBtn" id="addLedger"><i class="addIcon"></i>Add Ledger</button>
    <button type="button" class="ledgerBtn" id="addPayroll"><i class="addPay"></i>Add Monthly Payroll</button>
    <button type="button" class="ledgerBtn" id="addIncome"><i class="addIncome"></i>Add Monthly Income</button>
    <input class="searchBar" type="text" id="userInput" placeholder="Search for desired keyword...">
    <table>
        <tr><th>Date</th><th>Time</th><th>Ledger ID</th><th>Particular</th><th>Department</th><th>Amount</th><th>Transaction Type</th><th>Edit</th></tr>
        <?php include_once 'showLedgerDetails.php';?>
    </table>
</form>

<div class="emp-container">
    <form id="addLedgerForm" action="addLedger.php" method="post" class="ledgerForm">
        <div class="formContents">
            <p>Add Ledger</p>
            <label for="addLedgerParticular">Particulars:</label>
            <input type="text" id="addLedgerParticular" name="addLedgerParticular" required>
            <label for="ledgerDate">Created On:</label>
            <input type="date" id="ledgerDate" name="createdOn" required><br>
            <label for="ledgerTime" style="margin-top: -10px;">Time:</label>
            <input type="time" id="ledgerTime" name="time" required>
            <label for="deptNo" style="margin-top: 5px;">Select department id:</label>
            <select id="deptNo" name="deptNo" style="width: 300px;">
                <option disabled="disabled" selected="selected" style="display:none;" value="">Choose a Department Number</option>
                <?php include_once '../Manage Departments/updateDepartment.php'; getDeptDetails();?>
            </select>
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" value="0.00">
            <label class="transactionTypeLabel">Transaction Type:</label>
            <div style="display: -webkit-box; align-self: flex-start">
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
<script src="ledger.js"></script>
</body>
</html>