const addBtn = document.getElementById("add");
const updBtn = document.getElementById("update");
const rmvBtn = document.getElementById("remove");
const addForm = document.getElementById("addForm");
const backBtn = document.querySelector(".back");

addBtn.addEventListener('click',
    function () {
        addForm.style.display = 'block';
    });

backBtn.addEventListener('click', function() {
    addForm.style.display = 'none';
});
