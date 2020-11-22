{literal}
<div id='vue-commentary'>

    <ul id="commentary-list" class="list-group">
        <li 
            v-for="commentary in commentaries"
                        
            class="list-group-item"> 
            
            {{ commentary.rating }} - {{ commentary.commentary}}
         </li>
    </ul>

</div>
{/literal}