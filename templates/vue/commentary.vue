{literal}
<div id="vue-commentary">
            <div v-if="loading" class="card-body">
                Cargando...
            </div>
    <ul id="commentary-list" class="list-group">
        <li v-if="!loading"
            v-for="commentary in commentaries"
            class="list-group-item"> 
            {{ commentary.from }} </br>
            {{ commentary.commentary }} </br>
            Rating : {{ commentary.rating}}
            <button v-bind:id="commentary.id" class="delete_commentary_btn">Delete</button>            
         </li>
    </ul>
</div>
{/literal}
