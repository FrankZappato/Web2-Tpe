{if $smarty.session}
    {assign var="isAdmin" value=$smarty.session.isAdmin}
{else}
    {assign var="isAdmin"  value = "1"}
{/if}
{literal}
<div id="vue-commentary">
    <div class="commentary-title"> Commentaries for the product </div>
    <ul id="commentary-list" class="list-group">
        <li 
            v-for="commentary in commentaries"
            class="list-group-item"> 
            <span class="span-bold">From : </span>{{ commentary.from_user }} <br>
            <span class="span-bold">Commentary :</span> {{ commentary.commentary }} <br>
            <span class="span-bold">Rating :</span> {{ commentary.rating}}
        {/literal}
            {if $isAdmin == "11"}
                {literal}      
            <button v-bind:id="commentary.id" class="btn btn-danger delete_commentary_btn">Delete</button>  
        {/literal}
            {/if}     
            {literal}                   
         </li>
    </ul>
</div>
{/literal}
