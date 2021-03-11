<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>
<div class="woocommerce-MyAccount-account-funds">
	<p class="app_dashboard_row_bg">
		<?php printf( __( 'You currently have <strong>%s</strong> worth of funds in your account.', 'woocommerce-account-funds' ), $funds ); ?>
	</p>

	<?php echo $topup; ?>
	<?php echo $products; ?>
	<?php echo $recent_deposits; ?>
</div>
