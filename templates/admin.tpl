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
{include file="./navbar.tpl"}
<table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>            
        </thead>
        {foreach from=$products_s item=product}
            <tr>
                <td>
                {$product->id}
                </td>
                <td>                
                {$product->name}
                </td>
                <td>
                {$product->price}
                </td>
                <td>
                {$product->image}
                </td>
            </tr>
        {/foreach}        
        <tbody id="table">
        </tbody>
    </table>
    <form class="adminForm" action="add-product" method="POST">
                <input id="name" name="product-category" type="number" placeholder="Category Id">
                <input id="name" name="product-name" type="text" placeholder="Name">
                <input id="price" name="product-price" type="number" placeholder="Price">
                <input id="image" name="product-image" type="text" placeholder="Image name">                
                <button type="submit" class="" id="btnAgregar">Agregar</button>
                <button id="btnAgregaRandom">Agregar Random x3</button>
                <button id="btnBorrarTodos">Borrar Todos</button>
            </form>
</body>