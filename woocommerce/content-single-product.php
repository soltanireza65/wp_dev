<?php


defined('ABSPATH') || exit;

global $product;


do_action('woocommerce_before_single_product');
//woocommerce_output_all_notices();
if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.

    return;
}
?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

    <section class="container bg-white radius my-4 app_woo_single_product">
        <div>
            <div class="row">
                <div class="col-md-4 app_woo_single_product_col_4">
                    <div class="app_woo_product_thumb_icons d-flex justify-content-start text-secondary mt-0">
                        <a href="#" class="app_woo_compare_icon pl-3 wooscp-btn wooscp-btn-<?php echo get_the_ID() ?>" data-id="<?php echo get_the_ID() ?>">
                            <i class="fas fa-random "></i>
                        </a>
                        <a href="?add_to_wishlist=<?php echo get_the_ID() ?>" rel="nofollow" data-product-id="<?php echo get_the_ID() ?>" data-product-type="variable" data-original-product-id="<?php echo get_the_ID() ?>" class="add_to_wishlist single_add_to_wishlist ml-2" data-title="Add to wishlist">
                            <i class="yith-wcwl-icon fa fa-heart "></i>
                        </a>
                    </div>




                    <?php do_action('woocommerce_before_single_product_summary'); ?>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12 text-right">
                        <h6 class="text-right mb-0 mt-4">
                    </div>

                    <div class="col-md-6 d-inline-block text-right float-right product_meta_wraper">
                        <?php woocommerce_template_single_title(); ?>
                        <?php
                        //							_themename_show_tags()
                        ?>
                        <?php woocommerce_template_single_meta(); ?>
                        <?php woocommerce_template_single_rating(); ?>

                        <h6 class="text-danger mt-4">ویژگی های محصول</h6>
                        <?php
                        _themename_woo_attribute();
                        // _themename_woo_attribute_custom();
                        ?>
                    </div>
                    <?php do_shortcode('[woo_ps_sms]') ?>
                    <div class="col-md-6 d-inline-block">
                        <div class="px-3 py-4  radius mt-2" style="background-color: #F4F4F8;">
                            <div class="d-flex justify-content-between text-secondary font-weight-bold">
                                <p class="">فروشنده:</p>
                                <a href="<?php echo site_url(); ?>/store/<?php echo get_the_author_meta('user_login'); ?>">
                                    <?php the_author(); ?>

                                </a>
                            </div>
                            <hr class="m-0" />

                            <div class="d-flex justify-content-between mt-2 text-secondary font-weight-bold">
                                <p>شناسه محصول</p>
                                <?php echo $product->get_sku(); ?>
                            </div>
                            <hr class="m-0" />
                            <?php woocommerce_template_single_price(); ?>
                            <div class="d-flex justify-content-end mt-3">
                                <?php woocommerce_template_single_add_to_cart(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container bg-white  my-4 app_woo_product_short_desc">
        <div>
            <div class="row">
                <div class="text-right bg-white p-3 w-100">
                    <h6 class="text-danger">معرفی کوتاه</h6>
                    <?php woocommerce_template_single_excerpt(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="tabs container bg-white px-0 my-4">
        <div class="container">
            <div class="row">
                <?php woocommerce_output_product_data_tabs(); ?>
            </div>
        </div>
    </section>
    <section class="container bg-white radius my-4">
        <div class="container">
            <div class="row">
                <?php woocommerce_upsell_display(); ?>
            </div>
        </div>
    </section>


    <?php


    global $post;
    $related = get_posts(
        array(
            'category__in' => wp_get_post_categories($post->ID),
            'numberposts'  => 4,
            'post__not_in' => array($post->ID),
            'post_type'    => 'product'
        )
    );
    if ($related) {
    ?>
        <section class="container bg-white radius my-4">
            <div class="container">
                <div class="row related_products radius">
                    <?php woocommerce_output_related_products(); ?>
                </div>
            </div>
        </section>
    <?php
    }
    ?>


</div>

<?php do_action('woocommerce_after_single_product'); ?>