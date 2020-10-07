{include file="./head.tpl"}

<body class="admin">
    {include file="./navbarAdmin.tpl"}

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
                </tr>
                <tr>
                    <div id="modify-{$product->id}-div" class="div_for_modify div_{$product->id}">
                        <form action="modify-product" method="POST">
                            <label>Product:{$product->id} </label>
                            <input name="product-id" type="hidden" value={$product->id}>
                            <input name="product-category" type="number" placeholder="Category Id">
                            <input name="product-name" type="text" placeholder="Name">
                            <input name="product-price" type="number" placeholder="Price">
                            <input name="product-image" type="text" placeholder="Image name">
                            <input name="details" type="text" placeholder="Details">
                            <button type="submit">Confirm Modify</button>
                        </form>
                    </div>
                </tr>
            {/foreach}
            {/nocache}
        </tbody>
    </table>
    <form class="adminForm" action="add-product" method="POST">
        <input name="product-category" type="number" placeholder="Category Id">
        <input name="product-name" type="text" placeholder="Name">
        <input name="product-price" type="number" placeholder="Price">
        <input name="product-image" type="text" placeholder="Image name">
        <input name="details" type="text" placeholder="Details">
        <button type="submit" class="" id="btnAgregar">Add</button>
    </form>
    <script src="js/main.js"></script>
</body>