$('#addDept').on('click',function(){
    $('#addDeptForm').show();
    $('#overlay').addClass('overlay');
});

$('.deptBack').on('click', function () {
    window.location.href = "Department.php";
});

$("Button[name='updDeptBtn']").on('click', getDeptDetails);


function getDeptDetails() {
    console.log("calling this function");
    let deptNo = $(this).data('id');
    $('#updDeptForm').show();
    $('#overlay').addClass('overlay');
    if(deptNo !== ''){
        $.ajax({
            url: 'updateDepartment.php',
            type: 'POST',
            dataType: 'json',
            data: {
                deptNo: deptNo
            },
            success: function (response) {
                console.log(response);
                let details = "";
                details += "<label for='deptID'>Department ID:</label>";
                details += "<input type='text' id='deptID' name='deptID' value ='" + response['deptID'] + "' readonly><br>";
                details += "<label for='deptName'>Age:</label>";
                details += "<input type='text' id='deptName' name='deptName' value = '" + response['deptName'] + "' readonly><br>";
                details += "<label for='updDesc'>Department description:</label>";
                details += "<input type='text' id='updDesc' name='updDesc' value ='" + response['deptDesc'] + "' required><br>";
                details += "<label for='updBal'>Age:</label>";
                details += "<input type='text' id='updBal' name='updBal' value = '" + response['deptBal'] + "' required><br>";
                $('#updDeptContents').html(details).show();
            },
            error: function (xhr, status, error) {
                console.log('Error',error);
            }
        });
    }
    else {
        $('#updDeptContents').html('').hide();
    }
}