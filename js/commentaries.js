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
    document.getElementById('submit_commentary_button').addEventListener('click', addCommentary);


    let app = new Vue({
        el: '#vue-commentary',
        data: {
            loading: false,
            commentaries: []
        }
    });

    function getCommentaries(e) {
        let sendButton = document.getElementById('submit_commentary_button');
        let product_id_full = e.currentTarget.id;
        let product_id = product_id_full.replace("commentary_", "");
        sendButton.setAttribute('data-idToSend', product_id);
        app.loading = true;
        fetch('api/commentary/' + product_id)
            .then(response =>
                response.json())
            .then(commentaries => {
                app.commentaries = commentaries;
                app.loading = false;
            })
            .then(() => fillButtons())
            .catch(error => console.log(error));
            let deleteCommentaryBtn = document.getElementsByClassName('delete_commentary_btn');
            for (let i = 0; i < deleteCommentaryBtn.length; i++) {
            deleteCommentaryBtn[i].addEventListener("click", deleteCommentary);
        };   
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
            from: document.querySelector('#commentary_from').value,
            rating: document.querySelector('#commentary_rating').value,
            commentary: document.querySelector('#body_commentary').value,
        };

        fetch('api/commentary/' + e.currentTarget.getAttribute("data-idToSend"), {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(commentary)
            })
            .then(response => response.json())
            .then(commentary => app.commentaries.push(commentary))
            .catch(error => console.log(error));
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