//Learn some basic jquery from https://jquery.com/
$('#addDept').on('click',function(){
    $('#addDeptForm').show();
    $('#overlay').addClass('overlay');
});

$('.deptBack').on('click', function () {
    window.location.href = "Department.php";
});

$("Button[name='updDeptBtn']").on('click', getDeptDetails);

//Get department details without refreshing the page or clicking a button
//ajax learned from here https://code.tutsplus.com/tutorials/how-to-use-ajax-in-php-and-jquery--cms-32494
function getDeptDetails() {
    console.log("calling this function");
    //its custom attribute is data-id
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
                details += "<input type='text' id='deptID' name='deptID' value ='" + response['deptID'] + "' readonly>";
                details += "<label for='deptName'>Department Name:</label>";
                details += "<input type='text' id='deptName' name='deptName' value = '" + response['deptName'] + "' readonly>";
                details += "<label for='updDesc'>Department description:</label>";
                details += "<input type='text' id='updDesc' name='updDesc' class='description' value ='" + response['deptDesc'] + "' required>";
                details += "<label for='updBal'>Department Balance:</label>";
                details += "<input type='text' id='updBal' name='updBal' value = '" + response['deptBal'] + "' required>";
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