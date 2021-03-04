<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = '_themename_options';

    CSF::createOptions($prefix, array(
        'framework_title'         => 'قالب _themename <small>PyPracts</small>',
        'menu_title'              => 'تنظیمات قالب',
        'menu_slug'               => 'theme_options',
        'menu_position'           => 2,
        'menu_icon'               => 'dashicons-chart-pie',
        'admin_bar_menu_icon'     => 'dashicons-chart-pie',
        'show_in_customizer'      => true,
        'menu_position'           => 2,
        'show_search'             => false,
        'show_reset_all'          => false,
        'show_reset_section'      => false,
        'footer_text'  => 'footer_text',
        // 'footer_after'            => 'footer_after',
        'footer_credit'  => 'Thank you for creating with <a href="http://codestarframework.com/" target="_blank">Codestar Framework</a>',
        'class'                   => '_themename_theme_options_class',
        // 'defaults'                => array(),

    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'عمومی',
        'icon'   => 'fas fa-rocket',
        'fields' => array(
            array(
                'id'    => 'opt_footer_text',
                'type'  => 'text',
                'title' => 'متن کپی رایت فوتر',
            ),
            array(
                'id'    => 'opt_shop_background',
                'type'  => 'background',
                'title' => 'پس زمینه فروشگاه',
                'default'                         => array(
                    'background-color'              => '#DEE0E6',
                    'background-size'               => 'cover',
                    'background-position'           => 'center center',
                )
            ),

        )
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Tab Title 2',
        'fields' => array(

            // A textarea field
            array(
                'id'    => 'opt-textarea',
                'type'  => 'textarea',
                'title' => 'Simple Textarea',
            ),

        )
    ));
}


if (!function_exists('_themename_get_option')) {
    function _themename_get_option($option = '', $default = null) {
        $options = get_option('_themename_options'); // Attention: Set your unique id of the framework
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}
