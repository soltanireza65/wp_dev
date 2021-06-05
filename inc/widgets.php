<?php
function _themename_widgets_init() {
    register_sidebar(
        [
            'name'          => esc_html__('جایگاه اصلی', '_themename'),
            'id'            => 'sidebar_main',
            'description'   => esc_html__('ابزارک ها را اینجا بکشید تا در کنار محتوا نمایش داده شود..', '_themename'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__('جایگاه فروشگاه', '_themename'),
            'id'            => 'sidebar_shop',
            'description'   => esc_html__('ابزارک ها را اینجا بکشید تا در کنار محتوا نمایش داده شود..', '_themename'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__('جایگاه وبلاگ', '_themename'),
            'id'            => 'sidebar_blog',
            'description'   => esc_html__('ابزارک ها را اینجا بکشید تا در کنار محتوا نمایش داده شود..', '_themename'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__('جایگاه دکان', '_themename'),
            'id'            => 'sidebar_dokan',
            'description'   => esc_html__('ابزارک ها را اینجا بکشید تا در کنار محتوا نمایش داده شود..', '_themename'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
}
add_action('widgets_init', '_themename_widgets_init');
