{include file="./head.tpl"}

<body>
    {include file="./navbar.tpl"}
    <div class="container">    
    </div>
        <div class="search-container">
            <form action="category-search" method="POST">
                <select name="search" class="browser-default custom-select">
                    <option selected>Categories</option>
                    {foreach from=$categories_s item=category}
                        <option value="{$category->category_name}">{$category->category_name}</option>
                    {/foreach}
                    <option value="All">All</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="row row_products">
            {foreach from=$products_s item=product}
                <div class="col-sm-4 col-md-3">
                    <form method="post" action="add_to_cart">
                        <div class="products">
                            <img src="images/{$product->img_product}" alt="" class="img-responsive product-img" />
                            <h4 class="text-info name-text">{$product->name_product}</h4>
                            <h4>${$product->price}</h4>
                            <h5>{$product->category_name}</h5>
                            {if isset($smarty.session.isLogged)}
                                <input type="number" name="quantity" min="0" data-bind="value:replyNumber" />
                            {/if}
                            <input type="hidden" name="name" value="{$product->name_product}" />
                            <input type="hidden" name="price" value="{$product->price}" />
                            <input type="hidden" name="id" value="{$product->id}" />
                            <div class="btn_box">
                                {if isset($smarty.session.isLogged)}
                                    <button type="submit" name="add_to_cart" class="btn btn-info add-to-cart-btn">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                {/if}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{$product->id}">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </button>
                                <button id="commentary_{$product->id}" type="button" class="btn btn-primary commentaries_show_div" data-toggle="modal" data-target="#modal_commentaries">
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

    <div class="modal fade" id="modal_commentaries" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    {include file="./vue/commentary.vue"}
                </div>
                <div class="container">
                <div class="container" id="contact_container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-8 pb-5">
                            <form>
                                <div class="card border-secondary rounded-0">
                                    <div class="card-header p-0">
                                        <div class="bg-secondary text-white text-center py-2">
                                            <p class="m-0">Leave a comment for this product!</p>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-star text-secondary"></i></div>
                                                </div>
                                                <input type="number" class="form-control" id="commentary_rating" name="rating" placeholder="Rate" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope text-secondary"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="commentary_from" name="from" placeholder="El Fran" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-comment text-secondary"></i></div>
                                                </div>
                                                <textarea method="post" id="body_commentary" class="form-control" placeholder="Comment here!" required name="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                <input type="submit" value="Send commentary" data-idToSend=" " id="submit_commentary_button" class="btn btn-primary">    
                </div>
            </div>
        </div>
    </div>





    {if (isset($smarty.session.shopping_cart))}
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {nocache}
                    {foreach from=$smarty.session.shopping_cart item=item}
                        <tr>
                            <td>{$item['name']}</td>
                            <td>{$item['quantity']}</td>
                            <td>{$item['price']}</td>
                            <td>{$item['total']}</td>
                            <td>
                                <form method="POST" action="delete_from_cart">
                                    <button type="submit" name="delete_from_cart" class="btn btn-danger">
                                        <input type="hidden" name="id_item_on_cart" value={$item['id']}>
                                        <i class="fas fa-window-close"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                    {/nocache}
                </tbody>
            </table>
        </div>
    {/if}
    {include file="./footer.tpl"}    
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="js/commentaries.js"></script>

</html>