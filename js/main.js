document.addEventListener("DOMContentLoaded", function() {

    var modifyButtons = document.getElementsByClassName('btn_modify');

    for (var i = 0; i < modifyButtons.length; i++) {
        modifyButtons[i].addEventListener("click", showModifyDiv);
    }

    function showModifyDiv(e) {
        var oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", showModifyDiv);
        oldButton.addEventListener("click", hideEditDiv);
        var divForModify = document.getElementById(e.target.id + "-div");
        divForModify.classList.add("display");
    }

    function hideEditDiv(e) {
        var oldButton = document.getElementById(e.target.id);
        oldButton.removeEventListener("click", hideEditDiv);
        oldButton.addEventListener("click", showModifyDiv);
        var divForModify = document.getElementById(e.target.id + "-div");
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