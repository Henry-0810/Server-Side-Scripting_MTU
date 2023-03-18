const addBtn = document.getElementById("add");
const updBtn = document.getElementById("update");
const rmvBtn = document.getElementById("remove");
const addForm = document.getElementById("addForm");
const updForm = document.getElementById("updForm");
const backBtn = document.querySelectorAll(".back");

addBtn.addEventListener('click',
    function () {
        addForm.style.display = 'block';
        updForm.style.display = 'none';
    });

updBtn.addEventListener('click',
    function () {
        updForm.style.display = 'block';
        addForm.style.display = 'none';
    });

for (let i = 0; i < backBtn.length; i++) {
    backBtn[i].addEventListener('click',
        function () {
            addForm.style.display = 'none';
            updForm.style.display = 'none';
        });
}

$('document').ready(function () {
    $('#employeeNo').on('change', getSelectedValue);
});

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
                htmlString += "<button class='back'>Back</button>";
                htmlString += "<button type='submit' name='updSubmit'>Update</button>";
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







