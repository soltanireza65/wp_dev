<?php
add_action('wp_ajax_nopriv_live_search', 'live_search');
add_action('wp_ajax_live_search', 'live_search');
function live_search() {

    $keyword = $_POST['keyword'];
    $product_cat = $_POST['product_cat'];
    $args = array(
        'post_type' => 'product',
        'post_status'   => 'publish',
        'post_per_page' => -1,
        's' => $keyword,
    );


    if ($_POST['product_cat']) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' =>  $product_cat,
            )
        );
    }


    $products = new WP_Query($args);
    $productsArr = array();
    while ($products->have_posts()) :
        $products->the_post();
        $product = wc_get_product(get_the_ID());
        $productsArr[] = array(
            'name' => wp_trim_words(get_the_title(), 10),
            'image' => get_the_post_thumbnail(get_the_ID(), 'entry'),
            'link' => get_permalink(),
            'price' => $product->get_price_html(),
            // "q" => $product_cat,
            // 'object' => get_post(),
            // 'price' => $products->get_price_html(get_the_ID()),
            // 'price' => get_post_meta(get_the_ID(), '_price', true),
            // 'id' => get_the_ID(),
            // 'name' => get_the_title(),
        );

    endwhile;

    header('Content-Type: application/json');
    echo json_encode($productsArr);
    die;
}


function getProductCategories() {
    return get_terms('product_cat', [
        'hide_empty' => false
    ]);
}
