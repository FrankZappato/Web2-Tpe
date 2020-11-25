<div class="search-container">
    <form action="category-search" method="POST">
        <select name="search" class="browser-default custom-select">
            {foreach from=$categories_s item=category}
                <option value="{$category->category_name}">{$category->category_name}</option>
            {/foreach}
            <option value="All" selected="selected">All Products</option>
        </select>
        <button type="submit">Search</button>
    </form>
</div>