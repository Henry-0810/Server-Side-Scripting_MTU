$('#addLedger').on('click',function(){
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
});

$('.ledgerBack').on('click', function () {
    window.location.href = "Ledger.php";
});

$('document').ready(function(){
    let currDate = new Date().toJSON().slice(0,10);
    let currTime = new Date().toJSON().slice(11,16);
    console.log(currDate + " " + currTime);
    $('#ledgerDate').val(currDate);
    $('#ledgerTime').val(currTime);
});

$('#addLedgerForm').on('submit', function(e){
    if(!$('#debit').is(':checked') && !$('#credit').is(':checked')){
        e.preventDefault();
        alert("Please select a transaction type option");
    }
});