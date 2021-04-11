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
        <li class="result-product d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img class="result-prodyct-image" src="https://demo.coderboy.ir/negarshop/wp-content/uploads/2021/02/nivea-soft-crem-191301411010_0_0-150x150.jpg" alt="">
                <div class="mx-2">
                    <h5 class="result-title m-0">ساعت مچی عقربه ای مردانه کنت کول مدل</h5>
                    <p class="m-0">۱,۷۸۹,۰۰۰ تومان</p>
                </div>
            </div>
        </li>
        <li class="result-product d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img class="result-prodyct-image" src="https://demo.coderboy.ir/negarshop/wp-content/uploads/2021/02/nivea-soft-crem-191301411010_0_0-150x150.jpg" alt="">
                <div class="mx-2">
                    <h5 class="result-title m-0">ساعت مچی عقربه ای مردانه کنت کول مدل</h5>
                    <p class="m-0">۱,۷۸۹,۰۰۰ تومان</p>
                </div>
            </div>
        </li>
    </ul>
</div>