document.addEventListener("DOMContentLoaded", function() {

    //add function to all buttons for showing commentaries
    let showCommentariesButtons = document.getElementsByClassName('commentaries_show_div');
    for (let i = 0; i < showCommentariesButtons.length; i++) {
        showCommentariesButtons[i].addEventListener("click", getCommentaries);
    };

    //function for add_comment_button
    document.getElementById('submit_commentary_button').addEventListener('click', addCommentary);


    let app = new Vue({
        el: '#vue-commentary',
        data: {
            commentaries: []
        }
    });

    function getCommentaries(e) {
        let sendButton = document.getElementById('submit_commentary_button');
        let product_id_full = e.target.id;
        let product_id = product_id_full.replace("commentary_", "");
        sendButton.setAttribute('data-idToSend', product_id);
        fetch('api/commentary/' + product_id)
            .then(response => response.json())
            .then(commentaries => app.commentaries = commentaries)
            .then(console.log(app.commentaries))
            .catch(error => console.log(error));
    };

    function addCommentary(e) {
        e.preventDefault();
        const commentary = {
            from: document.querySelector('#commentary_from').value,
            rating: document.querySelector('#commentary_rating').value,
            commentary: document.querySelector('#body_commentary').value
        };

        fetch('api/commentary/' + e.target.getAttribute("data-idToSend"), {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(commentary)
            })
            .then(response => response.json())
            .then(commentary => app.commentaries.push(commentary))
            .catch(error => console.log(error));
    }
});