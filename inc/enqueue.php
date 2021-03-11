<?php
function _themename_scripts()
{
    wp_enqueue_style('_themename-fontawesome', get_template_directory_uri() . '/dist/assets/fonts/fa/css/all.min.css', [], '1.0.0', 'all');
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');

    // wp_enqueue_script('_themename-popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', ['jquery'], '1.0.0', true);
    // wp_enqueue_script('_themename-bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('_themename-swiper', get_template_directory_uri() . '/src/assets/js/vendors/swiper.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/src/assets/js/vendors/select2.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', '_themename_scripts');


function _themename_admin_assets()
{
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', [], '1.0.0', 'all');

    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', ['jquery'], '1.0.0', true);
}
add_action('admin_enqueue_scripts', '_themename_admin_assets');
