<?php



if (!defined('ABSPATH')) {
	exit;
}
?>


<div class="bg-light radius p-4 app_woo_order_pay">
	<h2 class="text-right mb-4">پرداخت برای سفارش</h2>

	<ul class="text-right line_height_3 pr-4">
		<li class="">
			<?php esc_html_e('Order number:', 'woocommerce'); ?>
			<strong><?php echo esc_html($order->get_order_number()); ?></strong>
		</li>
		<li class="">
			<?php esc_html_e('Date:', 'woocommerce'); ?>
			<strong><?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></strong>
		</li>
		<li class="">
			<?php esc_html_e('Total:', 'woocommerce'); ?>
			<strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
		</li>
		<?php if ($order->get_payment_method_title()) : ?>
			<li class="method">
				<?php esc_html_e('Payment method:', 'woocommerce'); ?>
				<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
			</li>
		<?php endif; ?>
	</ul>

	<?php do_action('woocommerce_receipt_' . $order->get_payment_method(), $order->get_id()); ?>

</div>


<div class="clear"></div>