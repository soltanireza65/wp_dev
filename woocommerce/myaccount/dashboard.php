<?php



if (!defined('ABSPATH')) {
    exit;
}
$allowed_html = array(
    'a' => array(
        'href' => array(),
    ),
);
?>
<p class="app_dashboard_row_bg app_dashboard_notice py-3">
    <?php
    /* translators: 1: Orders URL 2: Address URL 3: Account URL. */
    $dashboard_desc = __('From your account dashboard you can view your <a href="%1$s" class="app_dashboard_recent_orders_link">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
    if (wc_shipping_enabled()) {
        /* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
        $dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
    }
    printf(
        wp_kses($dashboard_desc, $allowed_html),
        esc_url(wc_get_endpoint_url('orders')),
        esc_url(wc_get_endpoint_url('edit-address')),
        esc_url(wc_get_endpoint_url('edit-account'))
    );
    ?>
</p>
<div class="_themename_profile-content d-flex flex-column align-items-end">
    <table class="table">
        <tr class="d-flex">
            <td class="w-50 border-0 d-flex">
                <i class="fas fa-user fa-2x pl-3 "></i>
                <div>
                    <div class="title pb-2 text-bold font-weight-bold"> نام و نام خانوادگی: </div>
                    <div class="value"><?php echo (!empty($current_user->user_firstname . $current_user->user_lastname)) ? $current_user->user_firstname . ' ' . $current_user->user_lastname : __('لطفا نام خود را وارد نمایید.', 'shoptheme'); ?></div>
                </div>
            </td>
            <td class="w-50 border-0 d-flex">
                <i class="fas fa-envelope fa-2x pl-3"></i>
                <div>

                    <div class="title pb-2 text-bold font-weight-bold "> <?php _e('پست الکترونیک :', 'shoptheme'); ?></div>
                    <div class="value"><?php echo (!empty($current_user->user_email)) ? $current_user->user_email : __('لطفا ایمیل خود را وارد نمایید.', 'shoptheme'); ?></div>
                </div>
            </td>
        </tr>
        <tr class="d-flex border-top">
            <td class="w-50 border-0 d-flex">
                <i class="fas fa-phone fa-2x pl-3"></i>
                <div>

                    <div class="title pb-2 text-bold font-weight-bold"> <?php _e('شماره تلفن همراه:', 'shoptheme'); ?>
                    </div>
                    <div class="value"><?php echo !empty(WC()->customer->get_billing_phone()) ? WC()->customer->get_billing_phone() : __('لطفا شماره تلفن خود را وارد نمایید.', 'shoptheme'); ?></div>
                </div>
            </td>
            <td class="w-50 border-0 d-flex border-dark">
                <i class="fas fa-calendar fa-2x pl-3"></i>
                <div>
                    <div class="title pb-2 text-bold font-weight-bold"> <?php _e('تاریخ عضویت:', 'shoptheme'); ?></div>
                    <div class="value"><?php echo date_i18n("Y/m/d", strtotime($current_user->user_registered)); ?></div>
                </div>
            </td>
        </tr>
    </table>
    <a class="btn btn-outline-dark app_bg_red_hover dashboard_btn_edit" href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>"><i class="fas fa-user-edit"></i> <?php _e('ویرایش اطلاعات', 'shoptheme'); ?></a>
</div>


<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
// do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
