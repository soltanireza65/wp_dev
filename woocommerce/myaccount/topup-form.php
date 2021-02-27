<form method="post">
	<h3><label for="topup_amount">افزایش اعتبار</label></h3>

	<div class="d-flex app_acount_founds_form_wraper">

		<p class="form-row form-row-first px-0">
			<input type="number" style="border-radius:0 10px 10px 0 !important;" class="input-text app_acount_founds_form_input" name="topup_amount" id="topup_amount" step="0.01" value="<?php echo esc_attr($min_topup); ?>" min="<?php echo esc_attr($min_topup); ?>" max="<?php echo esc_attr($max_topup); ?>" />
			<?php if ($min_topup || $max_topup) : ?>
				<span class="description">
					<?php
					printf(
						'%s%s%s',
						$min_topup ? sprintf(__('Minimum: <strong>%s</strong>.', 'woocommerce-account-funds'), wc_price($min_topup)) : '',
						$min_topup && $max_topup ? ' ' : '',
						$max_topup ? sprintf(__('Maximum: <strong>%s</strong>.', 'woocommerce-account-funds'), wc_price($max_topup)) : ''
					);
					?>
				</span>
			<?php endif; ?>
		</p>
		<p class="form-row px-0 mx-0">
			<input type="hidden" name="wc_account_funds_topup" value="true" />
			<input type="submit" class="app_bg_red_hover app_woo_acount_found_inc bg-danger text-white border-0 py-3" value="<?php _e('Top-up', 'woocommerce-account-funds'); ?>" />
		</p>
	</div>
	<?php wp_nonce_field('account-funds-topup'); ?>
</form>