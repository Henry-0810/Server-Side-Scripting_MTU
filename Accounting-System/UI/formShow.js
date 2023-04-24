const employeeBtn = document.querySelectorAll(".employeeBtn");
const employeeForms = document.querySelectorAll(".employeeForm");
const empBackBtn = document.querySelectorAll(".employeeBack");
const deptBtn = document.querySelectorAll(".deptBtn");
const deptForms = document.querySelectorAll(".deptForm");
const deptBackBtn = document.querySelectorAll(".deptBack");
const ledgerBtn = document.querySelectorAll(".ledgerBtn");
const ledgerForms = document.querySelectorAll(".ledgerForm");

// for (let i = 0; i < employeeBtn.length; i++) {
//     employeeBtn[i].addEventListener('click',
//         function (){
//             for (let j = 0; j < employeeForms.length; j++) {
//                 if (j !== i) {
//                     employeeForms[j].style.display = 'none';
//                 }
//             }
//         employeeForms[i].style.display = 'block';
//     })
// }
$('#addEmployee').on('click',function(){
    $('#addEmpForm').show();
    $('#overlay').addClass('overlay');
});

$('document').ready(function () {
    $('#deptNo').on('change',getDeptDetails);
});

//ajax learned from here https://code.tutsplus.com/tutorials/how-to-use-ajax-in-php-and-jquery--cms-32494
$("Button[name='updBtn']").on('click', getEmployeeDetails);
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
                        let deptOptions = "<label for='deptID'>Department ID: </label><select id='deptID' name='deptNo' style='width: 300px;'>";
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

$("Button[name='rmvBtn']").on('click', promptDialog);
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

function getDeptDetails() {
    let deptNo = $(this).val();
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

for (let i = 0; i < empBackBtn.length; i++) {
    empBackBtn[i].addEventListener('click',
        function () {
            window.location.href = "Employee.php";
        });
}

for (let i = 0; i < deptBackBtn.length; i++) {
    deptBackBtn[i].addEventListener('click',
        function () {
            window.location.href = "Department.php";
        });
}

for (let i = 0; i < deptBtn.length; i++) {
    deptBtn[i].addEventListener('click',
        function (){
            for (let j = 0; j < deptForms.length; j++) {
                if (j !== i) {
                    deptForms[j].style.display = 'none';
                }
            }
            deptForms[i].style.display = 'block';
        });
}

for (let i = 0; i < ledgerBtn.length; i++) {
    ledgerBtn[i].addEventListener('click',
        function (){
            for (let j = 0; j < ledgerForms.length; j++) {
                if (j !== i) {
                    ledgerForms[j].style.display = 'none';
                }
            }
            ledgerForms[i].style.display = 'block';
        });
}