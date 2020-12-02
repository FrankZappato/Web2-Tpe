<div class="search-container">
<form action="category-search" method="post">
    <div class="search-group">
        <select name="search" class="browser-default custom-select select_category">
            {foreach from=$categories_s item=category}
                <option value="{$category->category_name}">{$category->category_name}</option>
            {/foreach}
            <option value="All" selected="selected">All Products</option>
        </select>
        <button class="btn btn-secondary btn-info-search" type="submit">Search</button>
    </div>
</form>
<form action="search" method="post">
    <div class="search-group">
        <input type="text" name="special" placeholder="Search here">
        <button class="btn btn-secondary btn-info-search" type="submit">Search</button>
    </div>
    </form>
</div>