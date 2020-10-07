{include file="./head.tpl"}

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
                            <div class="btn_box">
                                <button type="submit" name="add_to_cart" class="btn btn-info add-to-cart-btn">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{$product->id}">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="modal{$product->id}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Details for {$product->name_product}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {$product->details}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
    {include file="./footer.tpl"}

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>