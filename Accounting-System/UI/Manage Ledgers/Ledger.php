<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ledger</title>
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
        .searchBar{
            background-image: url("../Design/Icons/searchIcon.svg");
            background-repeat: no-repeat;
            background-size: 20px;
            background-position: 5px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;x
        }
        .editIcon {
            background-image: url("../Design/Icons/editIcon.svg");
            background-repeat: no-repeat;
            background-size: contain;
            padding-left: 15px;
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
    <button type="button" class="ledgerBtn" id="uploadLedgerBtn"><i class="addIcon"></i>Upload Ledger</button>
    <input class="searchBar" type="text" id="searchLedger" placeholder="Search for desired particular...">
    <table id="ledgerTable">
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
            <input type="date" id="ledgerDate" name="createdOn" required>
            <label for="ledgerTime" style="margin-top: 5px;">Time:</label>
            <input type="time" id="ledgerTime" name="time" style="height: 18px;" required>
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
            <button type='button' class='ledgerBack'>Back</button>
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
            <Button type='button' class='ledgerBack'>Back</Button>
            <button type='submit' name='updLedgerSubmit'>Update</button>
        </div>
    </form>
</div>

<div class="emp-container">
    <form id="uploadLedgerForm" action="addLedgerCsv.php" method="post" enctype="multipart/form-data" class="ledgerForm">
        <div class="formContents">
            <p>Upload ledger records</p>
            <label for="uploadLedger">Upload File: </label>
            <input type="file" accept=".csv" id="uploadLedger" name="uploadLedger">
            <button type='button' class='ledgerBack'>Back</button>
            <button type="submit" name="uploadLedgerSubmit">Upload</button>
        </div>
    </form>
</div>
<script src="ledger.js"></script>
</body>
</html>