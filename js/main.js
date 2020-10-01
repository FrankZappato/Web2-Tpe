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

    /*var buttons = document.getElementsByClassName('btn_delete');

    for (var i = 0; i < buttons.length; i++)
        buttons[i].addEventListener("click", deleteProduct);


    function deleteProduct(e) {
        var formData = new FormData();
        formData.append('id_product', e.target.id);
        fetch("/web2-tp/delete-product", {
            "method": "post",
            "body": formData
        })
    }*/
})