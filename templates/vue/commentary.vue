{literal}
<div id="vue-commentary">

    <ul id="commentary-list" class="list-group">
        <li 
            v-for="commentary in commentaries"
            class="list-group-item"> 
            {{ commentary.body }} - {{ commentary.rating}}
         </li>
    </ul>

</div>
{/literal}
