<?php

function dokan_dashboard_btn() {
    if (!dokan_is_user_seller(get_current_user_id())) {
        return;
    }
    printf(
        '<a href="%s">%s</a>',
        esc_url(dokan_get_navigation_url()),
        esc_html(apply_filters('dokan_set_go_to_vendor_dashboard_btn_text', __('فروشندگان', '_themename')))
    );
}


// add_filter('woocommerce_product_subcategories_args', 'custom_woocommerce_product_subcategories_args');

function custom_woocommerce_product_subcategories_args($args) {
    $args['exclude'] = get_option('default_product_cat');
    return $args;
}

function wc_hide_selected_terms($terms, $taxonomies, $args) {
    $new_terms = array();
    if (in_array('product_cat', $taxonomies) && !is_admin() && is_shop()) {
        foreach ($terms as $key => $term) {
            if (!in_array($term->slug, array('uncategorized'))) {
                $new_terms[] = $term;
            }
        }
        $terms = $new_terms;
    }
    return $terms;
}
// add_filter('get_terms', 'wc_hide_selected_terms', 10, 3);

add_filter('pre_get_posts', '_themename_onsale_filters');
function _themename_onsale_filters($query) {
    if ($query->is_main_query() && $query->post_type = 'product') {
        if (isset($_GET['onsale'])) {
            $meta_query = array(
                'relation' => 'OR',
                array( // Simple products type
                    'key' => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                ),
                array( // Variable products type
                    'key' => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                )
            );
            $query->set('meta_query', $meta_query);
        }
        if (isset($_GET['bestsellers'])) {
            $meta_query     = array(
                array(
                    'key'           => 'total_sales',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            );
        }
    }

    return $query;
}


// add_filter( 'gettext', '_themename_no_reviews_heading', 20, 3 );
function _themename_no_reviews_heading($translated, $text, $domain) {

    if (function_exists('is_product') && is_product() && $translated == 'Reviews' && $domain == 'woocommerce') {
        $translated = 'Ooops... No reviews yet. Please leave one!';
    }

    return $translated;
}


// add_filter( 'woocommerce_reviews_title', '_themename_reviews_heading', 10, 3 );
function _themename_reviews_heading($heading, $count, $product) {

    return 'What customers think about this product';
}

// add_filter( 'woocommerce_product_additional_information_heading', '_themename_additional_info_heading' );
function _themename_additional_info_heading($heading) {

    return 'My new heading';
}

// add_filter( 'woocommerce_product_description_heading', '_themename_description_heading' );
function _themename_description_heading($heading) {

    return 'My new heading';
}

// add_filter( 'woocommerce_product_tabs', '_themename_rename_reviews_tab' );
function _themename_rename_reviews_tab($tabs) {

    $tabs['reviews']['title'] = str_replace('Reviews', 'What customers are saying', $tabs['reviews']['title']);

    return $tabs;
}

// add_filter( 'woocommerce_product_tabs', '_themename_rename_additional_info_tab' );

function _themename_rename_additional_info_tab($tabs) {

    $tabs['additional_information']['title'] = 'Product size';

    return $tabs;
}

function _themename_product_cat_list() {
    $term_id              = 'product_cat';
    $categories           = get_terms($term_id);
    // $cat_array['all'] = 'All Categories';

    if (!empty($categories)) {
        foreach ($categories as $cat) {
            $cat_info      = get_term($cat, $term_id);
            $cat_array[$cat_info->slug] = $cat_info->name;
        }
    }

    return $cat_array;
}


function shorten_woo_product_title($title, $id) {
    if (is_shop() || is_product_category() || is_product_tag() || is_home() || is_front_page()) {

        if (get_post_type($id) == 'product') {

            $title = wp_trim_words($title, 7);
        }
    }

    return $title;
}
add_filter('the_title', 'shorten_woo_product_title', 10, 2);

function _themename_show_product_tags() {
    $current_tags = get_the_terms(get_the_ID(), 'product_tag');
    if ($current_tags && !is_wp_error($current_tags)) {
        echo '<ul class="product_tags">';
        foreach ($current_tags as $tag) {
            $tag_title = $tag->name; // tag name
            $tag_link  = get_term_link($tag); // tag archive link
            echo '<li><a href="' . $tag_link . '">' . $tag_title . '</a></li>';
        }

        echo '</ul>';
    }
}

//add_action( 'woocommerce_single_product_summary', 'display_author_name', 20 );
function display_author_name() {
    // Get the author ID (the vendor ID)
    $vendor_id = get_post_field('post_author', get_the_id());
    // Get the WP_User object (the vendor) from author ID
    $vendor = new WP_User($vendor_id);

    $store_info = dokan_get_store_info($vendor_id); // Get the store data
    $store_name = $store_info['store_name'];          // Get the store name
    $store_url  = dokan_get_store_url($vendor_id);  // Get the store URL

    $vendor_name = $vendor->display_name;              // Get the vendor name
    $address     = $vendor->billing_address_1;           // Get the vendor address
    $postcode    = $vendor->billing_postcode;          // Get the vendor postcode
    $city        = $vendor->billing_city;              // Get the vendor city
    $state       = $vendor->billing_state;             // Get the vendor state
    $country     = $vendor->billing_country;           // Get the vendor country

    // Display the seller name linked to the store
    printf('<b>Seller Name:</b> <a href="%s">%s</a>', $store_url, $store_name);
}


// add_action('woocommerce_single_product_summary', 'display_some_product_attributes', 25);
function _themename_woo_attribute_custom() {
    // HERE define the desired product attributes to be displayed
    $defined_attributes = array('fyllighet', 'carrier', 'billing-e-number');

    global $product;
    $attributes = $product->get_attributes();

    if (!$attributes) {
        return;
    }

    $out = '<ul class="taste-attributes">';

    foreach ($attributes as $attribute) {

        // Get the product attribute slug from the taxonomy
        $attribute_slug = str_replace('pa_', '', $attribute->get_name());

        // skip all non desired product attributes
        if (!in_array($attribute_slug, $defined_attributes)) {
            continue;
        }

        // skip variations
        if ($attribute->get_variation()) {
            continue;
        }

        $name = $attribute->get_name();

        if ($attribute->is_taxonomy()) {

            $terms = wp_get_post_terms($product->get_id(), $name, 'all');
            // get the taxonomy
            $tax = $terms[0]->taxonomy;
            // get the tax object
            $tax_object = get_taxonomy($tax);
            // get tax label
            if (isset($tax_object->labels->singular_name)) {
                $tax_label = $tax_object->labels->singular_name;
            } elseif (isset($tax_object->label)) {
                $tax_label = $tax_object->label;
                // Trim label prefix since WC 3.0
                if (0 === strpos($tax_label, 'Product ')) {
                    $tax_label = substr($tax_label, 8);
                }
            }

            $out .= '<li class="' . esc_attr($name) . '">';
            $out .= '<p class="attribute-label">' . esc_html($tax_label) . ': </p> ';
            $tax_terms = array();

            foreach ($terms as $term) {
                $single_term = esc_html($term->name);
                // Insert extra code here if you want to show terms as links.
                array_push($tax_terms, $single_term);
            }

            $out .= '<span class="attribute-value">' . implode(', ', $tax_terms) . '</span><progress value="' . implode(', ', $tax_terms) .
                '" max="10"><div class="progress-bar"><span style="width:'
                . implode(', ', $tax_terms) . '0%">'
                . implode(', ', $tax_terms) . '</span></div></progress></li>';
        } else {
            $value_string = implode(', ', $attribute->get_options());
            $out .= '<li class="' . sanitize_title($name) . ' ' . sanitize_title($value_string) . '">';
            $out .= '<p class="attribute-label">' . $name . ': </p> ';
            $out .= '<progress value="' . esc_html($value_string) . '" max="10"></progress></li>';
        }
    }

    $out .= '</ul>';

    echo $out;
}


function _themename_woo_attribute() {
    global $product;
    $attributes = $product->get_attributes();
    if (!$attributes) {
        return;
    }
    $display_result = '<ul class="product_attributes_top">';
    foreach ($attributes as $attribute) {
        if ($attribute->get_variation()) {
            continue;
        }
        $name = $attribute->get_name();
        if ($attribute->is_taxonomy()) {
            $terms              = wp_get_post_terms($product->get_id(), $name, 'all');
            $cwtax              = $terms[0]->taxonomy;
            $cw_object_taxonomy = get_taxonomy($cwtax);
            if (isset($cw_object_taxonomy->labels->singular_name)) {
                $tax_label = $cw_object_taxonomy->labels->singular_name;
            } elseif (isset($cw_object_taxonomy->label)) {
                $tax_label = $cw_object_taxonomy->label;
                if (0 === strpos($tax_label, 'Product ')) {
                    $tax_label = substr($tax_label, 8);
                }
            }
            $display_result .= '<li class="attribute_item">' . $tax_label . ': ';

            $tax_terms      = array();
            foreach ($terms as $term) {
                // echo '<li>';
                $single_term = esc_html($term->name);
                array_push($tax_terms, $single_term);
                // echo '</li>';
            }
            $display_result .= implode(', ', $tax_terms) . '</li>';
        } else {
            $display_result .= '<li class="attribute_item">' . $name . ': ';
            $display_result .= esc_html(implode(', ', $attribute->get_options())) . '</li>';
        }
    }
    echo $display_result . '</ul>';
}
//add_action('woocommerce_single_product_summary', '_themename_woo_attribute', 25);

function _themename_have_coupon_message() {
    return '<i class="fa fa-ticket" aria-hidden="true"></i> Have a coupon? <a href="#" class="showcoupon">Click here to enter your discount code</a>';
}
// add_filter('woocommerce_checkout_coupon_message', '_themename_have_coupon_message');


function _themename_custom_pagination() {
    global $wp_query;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    $big   = 9999999999;
    $pages = paginate_links([
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_next' => true,
        'prev_text' => '',
        'next_text' => '',
    ]);
    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div class="pagination-wrap">';
        echo '<ul class="pagination">';
        foreach ($paged as $page) {
            echo '<li>$page</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

function _themename_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => '&#47;',
        'wrap_before' => '<div class="woocommerce_breadcrumb_container container "><nav class="text-right d-flex align-items-center text-secondary woocommerce-breadcrumb" itemprop="breadcrumb"><i class="fal fa-map-marker-alt text-right fa-2x px-2"></i>',
        'wrap_after'  => '</nav></div>',
        'before'      => '',
        'after'       => '',
        'home'        => _x('Home', 'breadcrumb', 'woocommerce'),
    );
}
add_filter('woocommerce_breadcrumb_defaults', '_themename_woocommerce_breadcrumbs');


add_filter('woocommerce_sale_flash', '_themename_add_percentage_to_sale_badge', 20, 3);
function _themename_add_percentage_to_sale_badge($html, $post, $product) {

    if ($product->is_type('variable')) {
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach ($prices['price'] as $key => $price) {
            // Only on sale variations
            if ($prices['regular_price'][$key] !== $price) {
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - (floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } elseif ($product->is_type('grouped')) {
        $percentages = array();

        // Get all variation prices
        $children_ids = $product->get_children();

        // Loop through variation prices
        foreach ($children_ids as $child_id) {
            $child_product = wc_get_product($child_id);

            $regular_price = (float) $child_product->get_regular_price();
            $sale_price    = (float) $child_product->get_sale_price();

            if ($sale_price != 0 || !empty($sale_price)) {
                // Calculate and set in the array the percentage for each child on sale
                $percentages[] = round(100 - ($sale_price / $regular_price * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        if ($sale_price != 0 || !empty($sale_price)) {
            $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
        } else {
            return $html;
        }
    }
    return '<span class="onsale">'  . $percentage . '</span>';
}
