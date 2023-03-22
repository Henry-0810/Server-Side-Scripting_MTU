const employeeBtn = document.querySelectorAll(".employeeBtn");
const employeeForms = document.querySelectorAll(".employeeForm");
const backBtn = document.querySelectorAll(".back");

for (let i = 0; i < employeeBtn.length; i++) {
    employeeBtn[i].addEventListener('click',
        function (){
            for (let j = 0; j < employeeForms.length; j++) {
                if (j !== i) {
                    employeeForms[j].style.display = 'none';
                }
            }
        employeeForms[i].style.display = 'block';
    })
}

$('document').ready(function () {
    $('#employeeNo').on('change', getSelectedValue);
});

// $('#rmvForm').on('submit', confirmDialog);
//
// function confirmDialog(){
//     let result = confirm("Are you sure you want to remove this employee?");
//     if (!result) {
//         alert("Employee removal cancelled!");
//         window.location.back();
//     }
//     else{
//         alert("Employee removed successfully!");
//         window.location.href = "Employee.php";
//     }
// }

function getSelectedValue() {
    let employeeNo = $(this).val();
    if (employeeNo !== '') {
        $.ajax({
            url: 'updateEmployee.php',
            type: 'POST',
            dataType: 'json',
            data: {
                employeeNo: employeeNo
            },
            success: function (response) {
                console.log(response);
                let htmlString = "";
                htmlString += "<label for='updJob'>Job:</label>";
                htmlString += "<input type='text' id='updJob' name='updJob' value ='" + response['job'] + "' required><br>";
                htmlString += "<label for='updAge'>Age:</label>";
                htmlString += "<input type='text' id='updAge' name='updAge' value = '" + response['age'] + "' required><br>";
                htmlString += "<label for='updSalary'>Salary:</label>";
                htmlString += "<input type='text' id='updSalary' name='updSalary'' value = '" + response['salary'] + "' required><br>";
                $('#updEmployeeContents').html(htmlString).show();
            },
            error: function (xhr, status, error) {
                console.log('Error',error);
            }
        });
    } else {
        $('#updEmployeeContents').html('').hide();
    }
}

for (let i = 0; i < backBtn.length; i++) {
    backBtn[i].addEventListener('click',
        function () {
            window.location.href = "Employee.php";
        });
}







