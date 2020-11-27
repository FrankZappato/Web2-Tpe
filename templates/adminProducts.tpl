{include file="./head.tpl"}

<body class="admin">
    {include file="./navbarAdmin.tpl"}
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" class="probando">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                {nocache}
                {foreach from=$products_s item=product}
                    <tr>
                        <th scope="row"> {$product->id}</th>
                        <td>
                            {$product->name_product}
                        </td>
                        <td>
                            {$product->price}
                        </td>
                        <td>
                            {$product->img_product}
                        </td>
                        <td>
                            {$product->details}
                        </td>
                        <td>
                            <div>
                                <form method="POST" action="delete-product">
                                    <button type="submit" class="btn_delete" id={$product->id}>Delete</button>
                                    <input type="hidden" name="id_product" value={$product->id}>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div>
                                <button class="btn_modify" value={$product->id} id="modify-{$product->id}">Modify</button>
                            </div>
                        </td>
                        <td>
                            <div>
                                <button class="btn_commentaries_show"  id="commentary_{$product->id}"
                                data-toggle="modal" data-target="#modal_commentaries">Commentaries</button>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <div id="modify-{$product->id}-div" class="div_for_modify div_{$product->id}">
                            <form action="modify-product" method="POST" enctype="multipart/form-data">
                                <label>Product:{$product->id} </label>
                                <input name="product-id" type="hidden" value={$product->id}>
                                <select name="product-category" class="browser-default custom-select">
                                    <option selected>Category</option>
                                    {foreach from=$categories item=category}
                                        <option value="{$category->id}">{$category->category_name}</option>
                                    {/foreach}
                                </select> <input name="product-name" type="text" placeholder="Name">
                                <input name="product-price" type="number" placeholder="Price">
                                <input name="product-image" type="file" placeholder="Image" id="imageToUpload">
                                <input name="details" type="text" placeholder="Details">
                                <button type="submit">Confirm Modify</button>
                            </form>
                        </div>
                    </tr>
                {/foreach}
                {/nocache}
                {include file="./commentariesModal.tpl"}
            </tbody>
        </table>
    </div>
    <form class="adminForm" action="add-product" method="POST" enctype="multipart/form-data">

        <select name="product-category" class="browser-default custom-select">
            <option selected>Category</option>
            {foreach from=$categories item=category}
                <option value="{$category->id}">{$category->category_name}</option>
            {/foreach}
        </select>

        <input name="product-name" type="text" placeholder="Name">
        <input name="product-price" type="number" placeholder="Price">
        <input name="product-image" type="file" placeholder="Image" id="imageToUpload">
        <input name="details" type="text" placeholder="Details">
        <button type="submit" class="" id="btnAgregar">Add</button>
    </form>
    <script src="js/commentaries.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>