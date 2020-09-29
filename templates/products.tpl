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

<body>
    {include file="./navbar.tpl"}
    <div class="container">
        <div class="row row_products">
            {foreach from=$products_s item=product}
                <div class="col-sm-4 col-md-3">
                    <form method="post" action="index.php?action=add&id={$product->id}">
                        <div class="products">
                            <img src="images/{$product->img_product}" alt="" class="img-responsive product-img" />
                            <h4 class="text-info name-text">{$product->name_product}</h4>
                            <h4>{$product->price}</h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="{$product->name_product}" />
                            <input type="hidden" name="price" value="{$product->price}" />
                            <input type="submit" name="add_to_cart" class="btn btn-info add-to-cart-btn" value="Add To Cart" />
                        </div>
                    </form>
                </div>
            {/foreach}
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>