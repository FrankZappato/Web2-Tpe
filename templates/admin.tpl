<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaCueva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body class="admin">
    {include file="./navbarAdmin.tpl"}
    <table>
        <thead>
            <th class="probando">ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
        </thead>
        {nocache}
        {foreach from=$products_s item=product}
            <tr>
                <td>
                    {$product->id}
                </td>
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
                        <button type="submit">Confirm Modify</button>
                    </form>
                </div>
            </tr>
        {/foreach}
        {/nocache}
        <tbody id="table">
        </tbody>
    </table>
    <form class="adminForm" action="add-product" method="POST">
        <input name="product-category" type="number" placeholder="Category Id">
        <input name="product-name" type="text" placeholder="Name">
        <input name="product-price" type="number" placeholder="Price">
        <input name="product-image" type="text" placeholder="Image name">
        <button type="submit" class="" id="btnAgregar">Add</button>
    </form>
    <script src="js/main.js"></script>
</body>