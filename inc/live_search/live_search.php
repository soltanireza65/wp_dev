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
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' =>  $product_cat,
            )
        ),



    );
    $products = new WP_Query($args);
    $productsArr = array();
    while ($products->have_posts()) :
        $products->the_post();

        $productsArr[] = array(
            'name' => get_the_title(),
            "q" => $product_cat,
            'object' => get_post(),
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'image' => get_the_post_thumbnail(get_the_ID(), 'entry'),
            'link' => get_permalink()
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
