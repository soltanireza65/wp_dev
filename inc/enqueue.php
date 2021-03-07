<?php
function _themename_scripts() {
    wp_enqueue_style('_themename-fontawesome', get_template_directory_uri() . '/dist/assets/fonts/fa/css/all.min.css', [], '1.0.0', 'all');
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');


    // 
    // wp_enqueue_script('_themename-popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', ['jquery'], '1.0.0', true);
    // wp_enqueue_script('_themename-bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', ['jquery'], '1.0.0', true);
    // wp_enqueue_script('_themename-swiper-js', 'https://unpkg.com/swiper/swiper-bundle.js', [], '1.0.0', true);
    // wp_enqueue_script('_themename-swiper-js', get_template_directory_uri() . '/dist/assets/other/swiper-bundle.min.js', ['jquery'], '1.0.0', true);
    // wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/src/assets/js/vendors/select2.js', ['jquery'], '1.0.0', true);



    wp_register_script('_themename_search_js', get_template_directory_uri() . '/inc/serach/search.js', ['jquery'], '1.0.0', true);
    wp_localize_script(
        '_themename_search_js',
        'opt',
        array(
            'ajaxUrl'   => admin_url('admin-ajax.php'),
            'noResults' => esc_html__('محصولی یافت نشد', '_themename'),
        )
    );






    // wp_enqueue_script('_themename-search-js', get_template_directory_uri() . '/inc/serach/search.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], '1.0.0', true);




    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', '_themename_scripts');


function _themename_admin_assets() {
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', [], '1.0.0', 'all');

    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', ['jquery'], '1.0.0', true);
}
add_action('admin_enqueue_scripts', '_themename_admin_assets');
