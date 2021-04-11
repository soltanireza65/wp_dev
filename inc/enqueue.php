<?php
function _themename_scripts() {
    // CSS
    wp_enqueue_style('_themename-fontawesome', get_template_directory_uri() . '/dist/assets/fonts/fa/css/all.min.css', [], '1.0.0', 'all');
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');


    // JAVASCRIPT
    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], '1.0.0', true);

    wp_localize_script('_themename-scripts', 'admin_url', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

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

add_action('enqueue_block_editor_assets',  '_themename_block_editor_assets');
function _themename_block_editor_assets() {
    wp_register_script('_themename_blocks_bundle', get_template_directory_uri() . '/inc/blocks/dist/bundle.js', ['wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api'], '1.0.0', true);
    wp_enqueue_script('_themename_blocks_bundle');
}


// 
function _themename_block_assets() {
    wp_register_script('_themename_blocks', get_template_directory_uri() . '/inc/blocks/dist/blocks-main.css');
    wp_enqueue_script('_themename_blocks');
}
