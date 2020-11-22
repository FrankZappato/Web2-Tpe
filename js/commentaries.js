document.addEventListener("DOMContentLoaded", function() {

    /*document.querySelector('#form-commentary').addEventListener('submit', e => {
        e.preventDefault();
        addCommentary();
    });*/

    let showCommentariesButtons = document.getElementsByClassName('commnentaries_show_div');    

    for (let i = 0; i < showCommentariesButtons.length; i++) {
        showCommentariesButtons[i].addEventListener("click", getCommentaries);
    }

    let app = new Vue({
        el: '#vue-commentary',
        data: {
            commentaries: [] 
        }
    });


    function getCommentaries(e) {
        let product_id_full = e.target.id;
        let product_id = product_id_full.replace("commentary_", "");
        
        fetch('api/commentary' + product_id)
            .then(response => response.json())
            .then(commentaries => app.commentaries = commentaries)            
            .catch(error => console.log(error));
    }

    function addCommentary() {
        const commentary = {
            from: document.querySelector('#commentary_from').value,
            rating: document.querySelector('#commentary_rating').value,
            body: document.querySelector('#body_commentary').value
        }

        fetch('api/commentary', {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(commentary)
            })
            .then(response => response.json())
            .then(commentary => app.commentaries.push(commentary))
            .catch(error => console.log(error));
    }

})