const addBtn = document.getElementById("add");
const updBtn = document.getElementById("update");
const rmvBtn = document.getElementById("remove");
const addForm = document.getElementById("addForm");
const updForm = document.getElementById("updForm");
const backBtn = document.querySelectorAll(".back");
const selectEmployee = document.getElementById("employeeNo");

addBtn.addEventListener('click',
    function () {
    addForm.style.display = 'block';
});

updBtn.addEventListener('click',
    function (){
    updForm.style.display = 'block'
});

for (let i = 0; i < backBtn.length; i++) {
    backBtn[i].addEventListener('click',
        function() {
            addForm.style.display = 'none';
            updForm.style.display = 'none';
        });
}

selectEmployee.addEventListener('change',
    function(){
    document.getElementById("updEmployeeContents").style.display = 'block';
    });






