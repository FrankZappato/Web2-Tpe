document.addEventListener("DOMContentLoaded", function() {

    //add function to all buttons for showing commentaries
    let showCommentariesButtons = document.getElementsByClassName('commentaries_show_div');
    for (let i = 0; i < showCommentariesButtons.length; i++) {
        showCommentariesButtons[i].addEventListener("click", getCommentaries);
    };

    let showCommentariesBtnAdmin = document.getElementsByClassName('btn_commentaries_show');
    for (let i = 0; i < showCommentariesBtnAdmin.length; i++) {
        showCommentariesBtnAdmin[i].addEventListener("click", getCommentaries);
    };

    //function for add_comment_button
    let btn = document.getElementById('submit_commentary_button');
    if (btn != null) {
        btn.addEventListener('click', addCommentary);
    }

    let app = new Vue({
        el: '#vue-commentary',
        data: {
            commentaries: []
        }
    });

    function getCommentaries(e) {
        let sendButton = document.getElementById('submit_commentary_button');
        let product_id_full = e.currentTarget.id;
        let product_id = product_id_full.replace("commentary_", "");
        if (sendButton != null) {
            sendButton.setAttribute('data-idToSend', product_id);
        }
        fetch('api/commentary/' + product_id)
            .then(response =>
                response.json())
            .then(commentaries => {
                app.commentaries = commentaries;
            })
            .then(() => fillButtons())
            .catch(error => {
                app.commentaries = [];
            });
    };

    function fillButtons() {
        let deleteCommentaryBtn = document.getElementsByClassName('delete_commentary_btn');
        for (let i = 0; i < deleteCommentaryBtn.length; i++) {
            deleteCommentaryBtn[i].addEventListener("click", deleteCommentary);
        };
    }

    function addCommentary(e) {
        e.preventDefault();
        const commentary = {
            from_user: document.querySelector('#commentary_from').value,
            rating: getRatingValue(),
            commentary: document.querySelector('#body_commentary').value,
        };
        console.log(commentary);

        fetch('api/commentary/' + e.currentTarget.getAttribute("data-idToSend"), {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(commentary)
            })
            .then(response => {
                if (response.ok) {
                    response.json().then(commentary => app.commentaries.push(commentary));
                }
            })
            .catch(error => console.log(error));
    }

    function getRatingValue() {
        let inputs = document.getElementsByClassName('input_star');
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].checked) {
                return inputs[i].value;
            }
        };
    }

    function deleteCommentary(e) {
        commentary_id = e.currentTarget.id;
        fetch('api/commentary/' + commentary_id, {
                method: 'DELETE',
                headers: { "Content-Type": "application/json" },
            })
            .then(response => response.json())
            .then(() =>
                removeByAttr(app.commentaries, 'id', commentary_id)
            )
            .catch(error => console.log(error));
    }

    /*while (arr[i].atrr!=attr) {
        i++;
    }
    arr.splice(i,1)
    return arr*/

    function removeByAttr(arr, attr, value) {
        let i = arr.length;
        while (i--) {
            if (arr[i] &&
                arr[i].hasOwnProperty(attr) &&
                (arguments.length > 2 && arr[i][attr] === value)) {

                arr.splice(i, 1);

            }
        }
        return arr;
    }
});