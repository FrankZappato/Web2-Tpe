{include file="./head.tpl"}

<body class="admin">
    {include file="./navbarAdmin.tpl"}
    <div class="table-responsive">
    {if $error_message != null}    
        <div class="alert alert-danger" role="alert">
            {$error_message}
        </div>
    {/if}
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" class="probando">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>                    
                </tr>
            </thead>
            <tbody>
                {nocache}
                {foreach from=$categories_s item=category}
                    <tr>
                        <th scope="row"> {$category->id}</th>
                        <td>
                            {$category->category_name}
                        </td>
                        <td>
                            {$category->color}
                        </td>                        
                        <td>
                            <div>
                                <form method="POST" action="delete-category">
                                    <button type="submit" class="btn_delete" id={$category->id}>Delete</button>
                                    <input type="hidden" name="id_category" value={$category->id}>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div>
                                <button class="btn_modify_category" value={$category->id} id="modify-{$category->id}">Modify</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <div id="modify-{$category->id}-div" class="div_for_modify div_{$category->id}">
                            <form action="modify-category" method="POST">
                                <label>Category:{$category->id} </label>
                                <input name="category-id" type="hidden" value={$category->id}>
                                <input name="category-name" type="text" placeholder="Category Name">
                                <input name="category-color" type="text" placeholder="Color">                                
                                <button type="submit">Confirm Modify</button>
                            </form>
                        </div>
                    </tr>
                {/foreach}
                {/nocache}
            </tbody>
        </table>
    </div>
    <form class="adminForm" action="add-category" method="POST">
        <input name="category-name" type="text" placeholder="Category Name">       
        <input name="category-color" type="text" placeholder="Color">
        <button type="submit" class="" id="btnAgregar">Add</button>
    </form>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>