document.addEventListener("DOMContentLoaded", function() {

    let modifyButtons = document.getElementsByClassName('btn_modify');

    for (let i = 0; i < modifyButtons.length; i++) {
        modifyButtons[i].addEventListener("click", showModifyDiv);
    }

    function showModifyDiv(e) {
        let oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", showModifyDiv);
        oldButton.addEventListener("click", hideEditDiv);
        let divForModify = document.getElementById(e.target.id + "-div");
        divForModify.classList.add("display");
    }

    function hideEditDiv(e) {
        let oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", hideEditDiv);
        oldButton.addEventListener("click", showModifyDiv);
        let divForModify = document.getElementById(e.target.id + "-div");
        divForModify.classList.remove("display");
    }

    let modifyCategoryButtons = document.getElementsByClassName('btn_modify_category');

    for (let i = 0; i < modifyCategoryButtons.length; i++) {
        modifyCategoryButtons[i].addEventListener("click", showModifyDivCategory);
    }

    function showModifyDivCategory(e) {
        let oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", showModifyDivCategory);
        oldButton.addEventListener("click", hideEditDivCategory);
        let divForModify = document.getElementById(e.target.id + "-div");
        divForModify.classList.add("display");
    }

    function hideEditDivCategory(e) {
        let oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", hideEditDivCategory);
        oldButton.addEventListener("click", showModifyDivCategory);
        let divForModify = document.getElementById(e.target.id + "-div");
        divForModify.classList.remove("display");
    }   
})