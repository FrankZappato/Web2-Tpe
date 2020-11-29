<div class="search-container">
    <form action="category-search" method="POST">
        <div class ="search-group">
            <select name="search" class="browser-default custom-select">
                {foreach from=$categories_s item=category}
                    <option value="{$category->category_name}">{$category->category_name}</option>
                {/foreach}
                <option value="All" selected="selected">All Products</option>
            </select>
            <button class="btn btn-info" type="submit">Search</button>
        </div>
    </form>
    <form action="search" method="POST">
        <input type="text" name="search" placeholder="Search here">
        <button class="btn btn-info" type="submit">Search</button>
    <form>
</div>