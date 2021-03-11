<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<section class="up-sells upsells products w-100">
		<?php
		$heading = apply_filters( 'woocommerce_product_upsells_products_heading', __( 'You may also like&hellip;', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<!-- <h2 class="mt-4 mr-4"><?php echo esc_html( $heading ); ?></h2> -->
			<h2 class="mt-4 mr-4">محصولات پرفروش این دسته</h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'product' );
				?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

	<?php
endif;

wp_reset_postdata();
