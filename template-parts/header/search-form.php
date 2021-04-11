<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
    <input class="product_search_term" type="text" id="keyword" name="s"></input>
    <?php

    $product_cats = getProductCategories();
    if (!empty($product_cats) && !is_wp_error($product_cats)) :
        $selected_product_cat = get_query_var('product_cat');
    ?>
        <select name="product_cat" id="product_cat" class="product_cat">
            <option value="" disabled selected>دسته بندی ها</option>
            <?php
            foreach ($product_cats as $product_cat) {
            ?>
                <option value="<?php echo esc_attr($product_cat->slug) ?>" <?php selected($product_cat->slug, $selected_product_cat) ?>><?php echo esc_html($product_cat->name); ?></option>
            <?php
            }
            ?>
        </select>
    <?php endif; ?>
    <button class="product_search_btn" id="product_search_btn" type="submit" value="جستجو">
        <i class="fad fa-search"></i>
    </button>

    <input type="hidden" id="" name="post_type" value="product" />
</form>
<div class="result" id="result">
    <ul class="products">
        <li class="d-flex justify-content-between">
            <img src="" alt="">
            <h5>titleeeeeeeeeeee</h5>
            <p>4444444</p>
        </li>
    </ul>
</div>