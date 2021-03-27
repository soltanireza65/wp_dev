<?php


add_action('wp_ajax_nopriv_live_search', 'live_search');
add_action('wp_ajax_live_search', 'live_search');
function live_search() {

    $search_value = $_POST['s'];
    $args = array(
        'post_type' => 'product',
        'post_per_page' => -1,
        's' => $search_value,
    );
    $products = get_posts($args);
    $list = array();

    foreach ($products as $product) {
        setup_postdata($product);
        $list[] = array(
            'object' => $product,
            'id' => $product->ID,
            'name' => $product->post_title,
            'content' => $product->post_content,
            'image' => get_the_post_thumbnail($product->ID, 'entry'),
            'link' => get_permalink($product->ID)
        );
    }

    // echo '<pre>';
    // print_r($list);
    // echo '</pre>';

    header('Content-Type: application/json');
    echo json_encode($list);
    die;
}
