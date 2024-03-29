<?php
$store_user               = dokan()->vendor->get(get_query_var('author'));
$store_info               = $store_user->get_shop_info();
$social_info              = $store_user->get_social_profiles();
$store_tabs               = dokan_get_store_tabs($store_user->get_id());
$social_fields            = dokan_get_social_profile_fields();

$dokan_appearance         = get_option('dokan_appearance');
$profile_layout           = empty($dokan_appearance['store_header_template']) ? 'default' : $dokan_appearance['store_header_template'];
$store_address            = dokan_get_seller_short_address($store_user->get_id(), false);

$dokan_store_time_enabled = isset($store_info['dokan_store_time_enabled']) ? $store_info['dokan_store_time_enabled'] : '';
$store_open_notice        = isset($store_info['dokan_store_open_notice']) && !empty($store_info['dokan_store_open_notice']) ? $store_info['dokan_store_open_notice'] : __('Store Open', 'dokan-lite');
$store_closed_notice      = isset($store_info['dokan_store_close_notice']) && !empty($store_info['dokan_store_close_notice']) ? $store_info['dokan_store_close_notice'] : __('Store Closed', 'dokan-lite');
$show_store_open_close    = dokan_get_option('store_open_close', 'dokan_appearance', 'on');

$general_settings         = get_option('dokan_general', []);
$banner_width             = dokan_get_option('store_banner_width', 'dokan_appearance', 625);

if (('default' === $profile_layout) || ('layout2' === $profile_layout)) {
    $profile_img_class = 'profile-img-circle';
} else {
    $profile_img_class = 'profile-img-square';
}

if ('layout3' === $profile_layout) {
    unset($store_info['banner']);

    $no_banner_class      = ' profile-frame-no-banner';
    $no_banner_class_tabs = ' dokan-store-tabs-no-banner';
} else {
    $no_banner_class      = '';
    $no_banner_class_tabs = '';
}

?>



<div class="col p-0 mb-3 product_sorting_panel bg-white d-flex align-items-center radius ">
    <div class="bg-white text-right p-3 radius">
        <div class="d-none d-md-flex align-items-start">
            <div class=" profile-img <?php echo esc_attr($profile_img_class); ?>">
                <img class="radius_right" src="<?php echo esc_url($store_user->get_avatar()) ?>" alt="<?php echo esc_attr($store_user->get_shop_name()) ?>" size="150">
            </div>
            <ul class="dokan-store-info radius_left">
                <?php if (!dokan_is_vendor_info_hidden('address') && isset($store_address) && !empty($store_address)) { ?>
                    <li class="dokan-store-address">
                        <i class="fa fa-map-marker fontsize_20"></i>
                        <?php echo wp_kses_post($store_address); ?>
                    </li>
                <?php } ?>

                <?php if (!dokan_is_vendor_info_hidden('phone') && !empty($store_user->get_phone())) { ?>
                    <li class="dokan-store-phone">
                        <i class="fa fa-mobile  fontsize_20"></i>
                        <a href="tel:<?php echo esc_html($store_user->get_phone()); ?>"><?php echo esc_html($store_user->get_phone()); ?></a>
                    </li>
                <?php } ?>

                <?php if (!dokan_is_vendor_info_hidden('email') && $store_user->show_email() == 'yes') { ?>
                    <li class="dokan-store-email  fontsize_20">
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:<?php echo esc_attr(antispambot($store_user->get_email())); ?>"><?php echo esc_attr(antispambot($store_user->get_email())); ?></a>
                    </li>
                <?php } ?>

                <li class="dokan-store-rating">
                    <i class="fa fa-star  fontsize_20"></i>
                    <?php echo wp_kses_post(dokan_get_readable_seller_rating($store_user->get_id())); ?>
                </li>

                <?php if ($show_store_open_close == 'on' && $dokan_store_time_enabled == 'yes') : ?>
                    <li class="dokan-store-open-close">
                        <i class="fa fa-shopping-cart  fontsize_20"></i>
                        <?php if (dokan_is_store_open($store_user->get_id())) {
                            echo esc_attr($store_open_notice);
                        } else {
                            echo esc_attr($store_closed_notice);
                        } ?>
                    </li>
                <?php endif ?>

                <?php do_action('dokan_store_header_info_fields',  $store_user->get_id()); ?>

            </ul>
        </div>
        <div class="d-flex justify-content-between flex-column flex-md-row">
            <ul class="d-flex product_sorting_options">
                <p class="product_sorting_title mx-2 font-weight-bold d-none d-md-block">مرتب سازس
                    بر اساس:</p>

                <li class="d-inline-block">
                    <a class="px-2 d-block" href="?orderby=date">
                        <p class="d-inline-block">جدید
                            ترین</p>
                    </a>
                </li>
                <li>
                    <a class="px-2" href="?orderby=popularity">محبوبترین</a>
                </li>
                <li>
                    <a class="px-2" href="?orderby=price">ارزان ترین</a>
                </li>
                <li>
                    <a class="px-2" href="?orderby=price-desc">گران ترین</a>
            </ul>
            <div class="top_pagination d-flex justify-content-end">
                <?php woocommerce_pagination(); ?>
            </div>
        </div>

    </div>
    <?php if ($social_fields) { ?>
        <div class="store-social-wrapper mr-auto d-none d-md-block">
            <ul class="store-social ">
                <?php foreach ($social_fields as $key => $field) { ?>
                    <?php if (!empty($social_info[$key])) { ?>
                        <li>
                            <a href="<?php echo esc_url($social_info[$key]); ?>" target="_blank">
                                <i class="ml-2 fa fa-<?php echo esc_attr($field['icon']); ?> " style="font-size: 20px;"></i>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>