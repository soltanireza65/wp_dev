<?php


if (!defined('ABSPATH')) {
	exit;
}

$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action('woocommerce_before_account_downloads', $has_downloads); ?>

<?php if ($has_downloads) : ?>

	<?php do_action('woocommerce_before_available_downloads'); ?>

	<?php do_action('woocommerce_available_downloads', $downloads); ?>

	<?php do_action('woocommerce_after_available_downloads'); ?>

<?php else : ?>
	<div class="app_dashboard_row_bg d-flex justify-content-between align-items-center px-3 app_woo_dls">
		<?php esc_html_e('No downloads available yet.', 'woocommerce'); ?>
		<a class=" app_woo_dls_btn font-weight-bold" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
			<?php esc_html_e('Browse products', 'woocommerce'); ?>
		</a>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_account_downloads', $has_downloads); ?>