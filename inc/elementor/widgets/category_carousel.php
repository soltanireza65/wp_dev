<?php

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}


class CategoryCarouselWidget extends Widget_Base {

    public function get_name() {
        return 'category_carousel';
    }

    public function get_title() {
        return 'اسلایدر دسته بندی ها';
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return ['pypracts'];
    }


    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => 'کوئری',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'categories',
            [
                'label'    => __('دسته بندی (ها)', 'plugin-domain'),
                'type'     => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => _themename_product_cat_list(),
                'default'  => ['all']

            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $term_id              = 'product_cat';
        $categories           = get_terms($term_id);
        // $cat_array['all'] = 'All Categories';

        if (!empty($categories)) {
            foreach ($categories as $cat) {
                $cat_info      = get_term($cat, $term_id);
                $cat_array[$cat_info->slug] = $cat_info->name;
                echo $cat_info->name;
            }
        }
    }
}
