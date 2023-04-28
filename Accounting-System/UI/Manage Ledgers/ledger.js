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
});

$('#addLedger').on('click',function(){
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
    console.log("clicked");
});

$('#addPayroll').on('click',function(){
    console.log("clicked");
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
    $('#addLedgerParticular').val("Monthly Payroll");
    $('#deptNo').on('change', function() {
        let deptID = $('#deptNo').val();
        console.log(deptID);
        if(deptID !== ' ') {
            $.ajax({
                method: 'POST',
                url: 'addLedger.php',
                dataType: 'json',
                data: {
                    functionName: 'monthlyPay', deptID: deptID
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
            alert("No employees in this department.");
            $('#addLedgerAmount').val('');
        }
    });
    $('#debit').prop('checked', true);
});

$('.ledgerBack').on('click', function () {
    window.location.href = "Ledger.php";
});

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