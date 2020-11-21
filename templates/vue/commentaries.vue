{literal}
<div id='vue-commentary'>

    <ul id="commentaries-list" class="list-group">
        <li 
            v-for="commentary in commentaries"
            :data-id-commentary="commentary.id"             
            class="list-group-item"> 
            
            {{ commentary.rating }} - {{ commentary.commentary}}
         </li>
    </ul>

</div>
{/literal}