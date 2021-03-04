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
                'type'  => 'wp_editor',
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
            array(
                'id'    => 'opt_shop_footer_background',
                'type'  => 'background',
                'title' => 'پس زمینه فوتر فروشگاه',
                'default'                         => array(
                    'background-color'              => '#DEE0E6',
                    'background-size'               => 'cover',
                    'background-position'           => 'center center',
                )
            ),
            array(
                'id'           => 'opt_q_link',
                'type'         => 'link',
                'title'        => 'لینک سوالات',
                'add_title'    => 'افزودن لینک',
                'edit_title'   => 'ویرایش لینک',
                'remove_title' => 'حذف',
            ),
            array(
                'id'      => 'opt_num_posts',
                'type'    => 'slider',
                'title'   => 'نمایش تعداد پست ها در آرشیو وبلاگ',
                'step'    => 1,
                'default' => 25,
            ),
            array(
                'id'      => 'opt_num_products',
                'type'    => 'slider',
                'title'   => 'نمایش تعداد محصولات در آرشیو فروشگاه',
                'step'    => 1,
                'default' => 25,
            ),
            array(
                'id'    => 'opt_add_to_card_bg',
                'type'  => 'color',
                'title' => 'پس زمینه دکمه خرید',
            ),
            array(
                'id'    => 'opt_add_to_card_color',
                'type'  => 'color',
                'title' => 'رنگ متن دکمه خرید',
            ),
            array(
                'id'        => 'opt_logo_image',
                'type'      => 'image_select',
                'title'     => 'قالب فروشگاه',
                'options'   => array(
                    'value-1' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
                    'value-2' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
                    'value-3' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
                ),
                'default'   => 'value-2'
            ),

            array(
                'id'      => 'opt-media-2',
                'type'    => 'media',
                'title'   => 'لوگو فروشگاه',
            ),

            array(
                'id'    => 'opt_add_to_card_color',
                'type'  => 'color',
                'title' => 'رنگ پس زمینه هدر',
            ),
            array(
                'id'    => 'opt_add_to_card_color',
                'type'  => 'color',
                'title' => 'رنگ کادر جستجو',
            ),
            array(
                'id'    => 'opt_add_to_card_color',
                'type'  => 'color',
                'title' => 'رنگ متن سربرگ',
            ),
            array(
                'id'    => 'opt_add_to_card_color',
                'type'  => 'color',
                'title' => 'رنگ حاشیه پروفایل',
            ),
            array(
                'id'       => 'opt-code-editor-3',
                'type'     => 'code_editor',
                'title'    => 'استایل های اختیاری',
                'settings' => array(
                    'theme'  => 'monokai',
                    'mode'   => 'css',
                ),
                'default'  => '.element{ color: #ffbc00; }',
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
