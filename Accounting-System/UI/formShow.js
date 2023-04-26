$('#addEmployee').on('click',function(){
    $('#addEmpForm').show();
    $('#overlay').addClass('overlay');
});

$('#addDept').on('click',function(){
    $('#addDeptForm').show();
    $('#overlay').addClass('overlay');
});

$('#addLedger').on('click',function(){
    $('#addLedgerForm').show();
    $('#overlay').addClass('overlay');
});

$('.deptBack').on('click', function () {
    window.location.href = "Department.php";
});

$('.employeeBack').on('click', function () {
    window.location.href = "Employee.php";
});

$('.ledgerBack').on('click', function () {
    window.location.href = "Ledger.php";
});

//ajax learned from here https://code.tutsplus.com/tutorials/how-to-use-ajax-in-php-and-jquery--cms-32494
$("Button[name='updEmpBtn']").on('click', getEmployeeDetails);
function getEmployeeDetails() {
    console.log("calling this function");
    let employeeID = $(this).data('id');
    console.log(employeeID);
    $('#updEmpForm').show();
    $('#overlay').addClass('overlay');
    if (employeeID !== '') {
        $.ajax({
            url: 'updateEmployee.php',
            type: 'POST',
            dataType: 'json',
            data: {
                employeeID: employeeID
            },
            success: function (response) {
                console.log(response);
                let details = "";
                details += "<label for='employeeID'>Employee ID:</label>";
                details += "<input type='text' id='employeeID' name='employeeID' value ='" + response['id'] + "' readonly><br>";
                details += "<label for='employeeName'>Employee Name:</label>";
                details += "<input type='text' id='employeeName' name='employeeName' value ='" + response['name'] + "' readonly><br>";
                details += "<label for='updJob'>Job:</label>";
                details += "<input type='text' id='updJob' name='updJob' value ='" + response['job'] + "' required><br>";
                details += "<label for='updAge'>Age:</label>";
                details += "<input type='text' id='updAge' name='updAge' value = '" + response['age'] + "' required><br>";
                details += "<label for='updSalary'>Salary:</label>";
                details += "<input type='text' id='updSalary' name='updSalary'' value = '" + response['salary'] + "' required><br>";
                $.ajax({
                    url: 'getDeptDetails.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function (deptDetails){
                        let deptOptions = "<label for='deptID'>Department ID: </label><select id='deptID' name='deptNo'>";
                        //to test if the 2D array is successfully parsed
                        for (let i = 0; i < deptDetails[0].length; i++) {
                            let output = deptDetails[0][i] + " - " + deptDetails[1][i];
                            console.log(output);
                            if(deptDetails[0][i] !== response['dept_ID']){
                                deptOptions += "<option value='" + deptDetails[0][i] + "'>" + output + "</option>";
                            }
                            else{
                                deptOptions += "<option value='" + deptDetails[0][i] + "' selected='selected'>" + output + "</option>";
                            }
                        }
                        deptOptions += "</select>";
                        details += deptOptions;
                        $('#updEmployeeContents').html(details).show();
                    },
                    error: function (xhr, status, error) {
                        console.log('Error',error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.log('Error',error);
            }
        });
    } else {
        $('#updEmployeeContents').html('').hide();
    }
}

$("Button[name='rmvEmpBtn']").on('click', promptDialog);
function promptDialog() {
    console.log("calling this function");
    let employeeData = $(this).data('id');
    console.log(employeeData);
    let result = confirm("Are you sure you want to remove this employee?");
    if (result) {
        $.ajax({
            url: 'removeEmployee.php',
            type: 'POST',
            dataType: 'json',
            data: {
                employeeData: employeeData
            },
            success: function(response) {
                if (response.success) {
                    alert("Employee removed successfully!");
                    window.location.href = "Employee.php";
                } else {
                    alert("Failed to remove employee.");
                }
            },
            error: function (xhr, status, error) {
                console.log('Error', error);
            }
        });
    }
}

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

