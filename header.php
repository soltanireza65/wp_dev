<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- <pre> -->
    <?php
    // print_r(_themename_get_option('opt_shop_background', '#f0f0f1'));
    ?>
    <!-- </pre> -->

    <?php wp_body_open(); ?>
    <!-- <div id="page" class="site"> -->
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', '_themename'); ?></a>
    <header id="" class="site-header">
        <div class="app_top_header d-flex justify-content-around justify-content-lg-between align-items-center container">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div>
            <div class="header_search_form_wraper">
                <?php _themename_woo_product_search(); ?>
            </div>

            <div class="d-flex position-relative">
                <div class="d-flex align-items-center p-0 px-1 text-secondary">
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


    <div id="page" class="site mx-auto rounded-2 mb-5">
        <a class="skip-link screen-reader-text d-none" href="#primary"><?php esc_html_e('Skip to content', '_themename'); ?></a>