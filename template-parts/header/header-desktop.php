<header id="" class="site-header">
    <div class="app_top_header  container">
        <div class="row">
            <div class="col-md-3 text-right">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header_search_form_wraper">
                    <?php
                    // _themename_woo_product_search();
                    ?>
                    <!-- ============================================================= -->

                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                        <!-- <label class="screen-reader-text" for="woocommerce-product-search-field"></label> -->
                        <input type="search" id="woocommerce-product-search" class="product-search-field" placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />

                        <?php
                        $product_cats = get_terms(array(
                            'taxonomy' => 'product_cat',
                        ));

                        if (!empty($product_cats) && !is_wp_error($product_cats)) :
                            $selected_product_cat = get_query_var('product_cat');
                        ?>
                            <select name="product_cat" id="product_cat_select" class="product_cat_select js-example-basic-single cate-dropdown">
                                <option value="">دسته بندی ها</option>
                                <?php
                                foreach ($product_cats as $product_cat) {
                                ?>
                                    <option value="<?php echo esc_attr($product_cat->slug) ?>" <?php selected($product_cat->slug, $selected_product_cat) ?>><?php echo esc_html($product_cat->name); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <script>
                                jQuery(document).ready(function() {
                                    jQuery('#product_cat_select').select2();
                                });
                            </script>
                        <?php endif; ?>

                        <button type="submit" value="جستجو"><?php echo esc_html_x('Search', 'submit button', 'woocommerce'); ?></button>
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                    <div id="search_result">

                    </div>

                    <!-- ============================================================= -->


                </div>
            </div>
            <div class="col-md-3 mr-auto">
                <div class="d-flex position-relative">
                    <div class="d-flex align-items-center p-0 px-1 text-secondary mr-auto">
                        <div class="user_links_dropdown mr-3 ">
                            <a href="#" class="dropbtn app_woo_user_icon"><i class="fal fa-user  fontsize_17 circle_padding_white"></i></a>

                            <div class=" text-center overflow-hidden user_links_dropdown-content text-right border-0 radius app_auth_urls" aria-labelledby="dropdownMenuButton">

                                <?php if (is_user_logged_in()) : ?>
                                    <?php
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $myaccount_page_url = get_permalink($myaccount_page_id);
                                    }
                                    ?>
                                    <a class="dropdown-item" href="<?php echo $myaccount_page_url ?>">حساب کاربری</a>
                                    <?php
                                    $store_user = dokan()->vendor->get(get_query_var('author'));
                                    // var_dump($store_user);
                                    $user = wp_get_current_user();
                                    if (in_array('seller', (array) $user->roles)) {
                                    ?>
                                        <a class="dropdown-item seller_dash" href="<?php echo get_site_url() ?>/shop_proj/dashboard">پنل فروشندگان</a>
                                    <?php
                                    }
                                    ?>
                                    <?php wp_loginout(); ?>
                                <?php else : ?>
                                    <a class="text-center dropdown-item" href="<?php echo get_site_url() ?>/shop_proj/my-account/">ورود/ ثبت نام</a>

                                <?php endif; ?>
                            </div>
                        </div>



                        <a class="ml-3 d-none d-md-block app_woo_wishlist_icon" href="<?php echo get_site_url() . '/wishlist'; ?>">
                            <i class="fal fa-heart fontsize_17 icon-size-md circle_padding_white"></i>
                        </a>

                        <div class="app_woo_mini_cart">
                            <?php
                            if (function_exists('_themename_woocommerce_header_cart')) {
                                _themename_woocommerce_header_cart();
                            }
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="site-navigation" class="site-navigation container" role="navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location'    => 'mega_menu',
                'menu_id'           => 'mega_menu',
                'menu_class'        => 'mega_menu',
                'container'         => false,
                // 'container_class'   => 'mega_menu_container',
                // 'container_id'      => 'mega_menu_container',
                'fallback_cb'       => false,
                // 'before'            => 'before',
                // 'after'             => 'after',
                // 'link_before'       => '<i class="fad fa-laptop"></i>',
                // 'link_after'        => '<i class="fad fa-laptop"></i>',
                'depth'             => 3,
                // 'walker'            => 3,
                // 'items_wrap'        => 'items_wrap',
                'item_spacing'      => 'item_spacing',
            )
        );
        ?>
    </nav>
</header>