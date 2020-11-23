{literal}
<div id="vue-commentary">
    <ul id="commentary-list" class="list-group">
        <li 
            v-for="commentary in commentaries"
            class="list-group-item"> 
            {{ commentary.from }} </br>
            {{ commentary.commentary }} </br>
            Rating : {{ commentary.rating}}
         </li>
    </ul>
</div>
{/literal}
