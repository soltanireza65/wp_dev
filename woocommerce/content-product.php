<?php


defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || false === wc_get_loop_product_visibility($product->get_id()) || !$product->is_visible()) {
	return;
}

?>

<li <?php wc_product_class('', $product); ?>>

	<div class="card app_card">
		<div class="card_top position-relative">
			<img class="card-img-top app_card_image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="PH" />

			<div class="product_icons_wraper align-middle position-absolute">
				<div class="product_icons radius text-center d-flex align-items-center">
					<!-- <?php woocommerce_template_loop_add_to_cart(); ?> -->
					<!--					--><?php //echo do_shortcode( '[wooscp]' ) 
												?>
					<a href="#" class="wooscp-btn wooscp-btn-<?php echo get_the_ID() ?>" data-id="<?php echo get_the_ID() ?>">
						<i class="fas fa-random"></i>
					</a>
					<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
				</div>

			</div>
		</div>
		<div class="card-body">
			<h6 class="card-title text-center font-weight-bold" style="">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h6>
			<div class="d-flex align-items-center">
				<div class="app_woo_add_to_cart_wraper">
					<?php woocommerce_template_loop_add_to_cart(); ?>
				</div>
				<div class="mr-auto product_price_wraper">
					<?php echo $product->get_price_html(); ?>
				</div>
			</div>
		</div>
	</div>


	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action('woocommerce_before_shop_loop_item');
	woocommerce_show_product_loop_sale_flash();
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action('woocommerce_before_shop_loop_item_title');

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action('woocommerce_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action('woocommerce_after_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action('woocommerce_after_shop_loop_item');
	?>
</li>