<?php
function _themename_widgets_init()
{
    register_sidebar(
        [
            'name'          => esc_html__('سایدبار فروشگاه', '_themename'),
            'id'            => 'sidebar_store',
            'description'   => esc_html__('Add widgets here.', '_themename'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
}
add_action('widgets_init', '_themename_widgets_init');
