{if $smarty.session}
    {assign var="isAdmin" value=$smarty.session.isAdmin}
{else}
    {assign var="isAdmin"  value = "1"}
{/if}
{literal}
<div id="vue-commentary">
            <div v-if="loading" class="card-body">
                Cargando...
            </div>
    <ul id="commentary-list" class="list-group">
        <li v-if="!loading"
            v-for="commentary in commentaries"
            class="list-group-item"> 
            From : {{ commentary.from_user }} </br>
            Commentary : {{ commentary.commentary }} </br>
            Rating : {{ commentary.rating}}
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
