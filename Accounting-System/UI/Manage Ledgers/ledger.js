$('document').ready(function(){
    let currDate = new Date().toJSON().slice(0,10);
    let hour = new Date().toJSON().slice(11,13);
    let min = new Date().toJSON().slice(14,16);
    //adds one hour to current time because daylight savings
    hour = parseInt(hour) + 1;
    let currTime = hour + ":" + min;
    console.log(currDate + " " + currTime);
    $('#ledgerDate').val(currDate);
    $('#ledgerTime').val(currTime);

    $('#addLedgerForm').on('submit', function(e){
        //if date not selected, this return false, else true
        if(!$('#ledgerDate').val()){
            e.preventDefault();
            alert("Please enter a date");
        }
        //same as date
        if(!$('#ledgerTime').val()){
            e.preventDefault();
            alert("Please enter a time");
        }
        //validate radio buttons for transaction type
        if(!$('#debit').is(':checked') && !$('#credit').is(':checked')){
            e.preventDefault();
            alert("Please select a transaction type option");
        }
    });
});

$('#addLedger').on('click',function(){
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
    console.log("clicked");
});

$('#addPayroll').on('click',function(){
    showLedgerForm("Monthly Payroll", "monthlyPay");
    $('#credit').prop('checked', true);
});

$('#addIncome').on('click',function(){
    showLedgerForm("Monthly Income", "monthlyIncome");
    $('#debit').prop('checked', true);
});

$('#uploadLedgerBtn').on('click', function(e){
    $('#uploadLedgerForm').show();
    $('#overlay').addClass('overlay');
});

function showLedgerForm(particular, functionName) {
    console.log("clicked");
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
    $('#addLedgerParticular').val(particular);
    $('#deptNo').on('change', function() {
        let deptID = $('#deptNo').val();
        console.log(deptID);
        if(deptID !== ' ') {
            $.ajax({
                method: 'POST',
                url: 'addLedger.php',
                dataType: 'json',
                data: {
                    functionName: functionName, deptID: deptID
                },
                success: function (response) {
                    console.log(response);
                    $('#amount').val(response);
                },
                error: function (xhr, status, error) {
                    console.log('Error', error);
                }
            });
        }
        else{
            alert("Select a department");
            $('#addLedgerAmount').val('');
        }
    });
}

$('.ledgerBack').on('click', function () {
    window.location.href = "Ledger.php";
});

//filter table learn from here - https://www.w3schools.com/howto/howto_js_filter_table.asp
//Learned toggle() from - https://www.w3schools.com/jquery/eff_toggle.asp
$('#searchLedger').on('keyup', function() {
    let value = $(this).val().toLowerCase();
    $('#ledgerTable tr').filter(function(){
        $(this).toggle($(this).children("td:eq(3)").text().toLowerCase().indexOf(value) > -1);
    });
});

$("Button[name='updLedgerBtn']").on('click', function(){
    console.log("calling this function");
    let ledgerID = $(this).data('id');
    console.log(ledgerID);
    $('#updLedgerForm').show();
    $('#overlay').addClass('overlay');
    if(ledgerID !== ' ') {
        $.ajax({
            method: 'POST',
            url: 'updateLedger.php',
            dataType: 'json',
            data: {
                ledgerID: ledgerID
            },
            success: function (response) {
                console.log(response);
                let details = "";
                details += "<label for='ledgerID'>Ledger ID:</label>";
                details += "<input type='text' name='ledgerID' value='" + response['id'] + "' readonly>";
                details += "<label for='updLedgerParticular'>Particular:</label>";
                details += "<input type='text' name='updLedgerParticular' value='" + response['particulars'] + "'>";
                details += "<label for='updLedgerDate'>Date:</label>";
                details += "<input type='date' name='updLedgerDate' value='" + response['created_On'].toString().slice(0,10) + "'  style='margin-bottom: 5px;'>";
                details += "<label for='updLedgerTime'>Time:</label>";
                details += "<input type='time' name='updLedgerTime' value='" + response['created_On'].toString().slice(11,16) + "' style='height: 18px; margin-bottom: 5px;'>";
                $.ajax({
                    url: '../getDeptDetails.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function (deptDetails) {
                        let deptOptions = "<label for='deptID'>Department ID: </label><select id='deptID' name='deptNo'>";
                        //to test if the 2D array is successfully parsed
                        for (let i = 0; i < deptDetails[0].length; i++) {
                            let output = deptDetails[0][i] + " - " + deptDetails[1][i];
                            console.log(output);
                            if (deptDetails[0][i] !== response['dept_ID']) {
                                deptOptions += "<option value='" + deptDetails[0][i] + "'>" + output + "</option>";
                            } else {
                                deptOptions += "<option value='" + deptDetails[0][i] + "' selected='selected'>" + output + "</option>";
                            }
                        }
                        deptOptions += "</select>";
                        details += deptOptions;
                        details += "<label for='updLedgerAmount'>Amount:</label>";
                        details += "<input type='text' name='updLedgerAmount' value='" + response['amount'] + "'>";
                        details += "<label>Transaction Type:</label>";
                        details += "<div style='display: -webkit-box; align-self: flex-start'>";
                        details += "<label for='debit' class='debtCredOption'>Debit</label>"
                        details += "<input type='radio' name='debtCredOption' value='D' " + (response['type'] === 'D' ? "checked" : "") + ">Debit";
                        details += "<label for='credit' class='debtCredOption'>Credit</label>";
                        details += "<input type='radio' name='debtCredOption' value='C' " + (response['type'] === 'C' ? "checked" : "") + ">Credit";
                        details += "</div>";
                        $('#updLedgerContents').html(details).show();
                    },
                    error: function (xhr, status, error) {
                        console.log('Error', error, xhr.responseText);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.log('Error', error, xhr.responseText);
            }
        });
    }
});


