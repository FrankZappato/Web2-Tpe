document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.getElementsByClassName('btn_delete');

    for (var i = 0; i < buttons.length; i++)
        buttons[i].addEventListener("click", deleteProduct);


    function deleteProduct(e) {
        var formData = new FormData();
        formData.append('id_product', e.target.id);
        fetch("/web2-tp/delete-product", {
            "method": "post",
            "body": formData
        }).then(window.location.href = '/web2-tp/admin')
    }
})