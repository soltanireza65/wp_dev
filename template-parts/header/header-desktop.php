<header id="" class="site-header">
    <div class="app_top_header  container">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 text-right">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="col-md-6 header_search_form_wraper position-relative" style="z-index: 33;">
                <!-- ============================================================= -->
                <?php
                get_template_part('template-parts/header/search-form');
                ?>
                <!-- ============================================================= -->
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center position-relative">
                <div class="user_links_dropdown mr-3 position-relative">
                    <a href="#" class="dropbtn app_woo_user_icon">
                        <i class="fal fa-user  fontsize_17 circle_padding_white"></i>
                    </a>
                    <div class="text-center overflow-hidden user_links_dropdown-content text-right border-0 radius app_auth_urls" aria-labelledby="dropdownMenuButton">
                        <?php get_user_links() ?>
                    </div>
                </div>
                <a class="ml-3 d-none d-md-block app_woo_wishlist_icon circle_padding_white" href="<?php echo get_site_url() . '/wishlist'; ?>">
                    <i class="fal fa-heart fontsize_17 icon-size-md  "></i>
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