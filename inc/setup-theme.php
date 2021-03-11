<?php
if (!function_exists('_themename_setup')) :
    function _themename_setup()
    {
        load_theme_textdomain('_themename', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            [
                'mega_menu' => esc_html__('مگامنو', '_themename'),
                'main_menu' => esc_html__('منوی اصلی', '_themename'),
            ]
        );


        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                '_themename_custom_background_args',
                [
                    'default-color' => 'ffffff',
                    'default-image' => '',
                ]
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support(
            'custom-logo',
            [
                'height'      => 50,
                'width'       => 50,
                'flex-width'  => true,
                'flex-height' => true,
            ]
        );
    }
endif;
add_action('after_setup_theme', '_themename_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _themename_content_width()
{
    $GLOBALS['content_width'] = apply_filters('_themename_content_width', 640);
}
add_action('after_setup_theme', '_themename_content_width', 0);
