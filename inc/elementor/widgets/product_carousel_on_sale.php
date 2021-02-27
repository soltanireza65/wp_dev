<?php
// require_once get_template_directory() . '/inc/elementor/helpers/utlis.php';

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}


class ProductCarouselOnSaleWidget extends Widget_Base {

    public function get_name() {
        return 'product_carousel_on_sale';
    }

    public function get_title() {
        return 'اسلایدر محصولات با تخفیف';
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
                // 'default'  => ['all']

            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('تصویر اسلایدر', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // $this->add_control(
        //     'on_sale',
        //     [
        //         'label' => __('حراجی', 'plugin-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => __('بله', 'your-plugin'),
        //         'label_off' => __('خیر', 'your-plugin'),
        //         'return_value' => 'yes',
        //         'default' => 'yes',
        //     ]
        // );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        if ($settings['categories']) {
            $args = [
                'posts_per_page' => 15,
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'ignore_sticky_posts'   => 1,
                'meta_query'        => WC()->query->get_meta_query(),
                'post__in'          => array_merge(array(0), wc_get_product_ids_on_sale()),
                'tax_query'      => [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        // 'field'    => 'term_id',
                        'terms'    => $settings['categories'],
                    ],
                ],
            ];




            $q = new WP_Query($args);

?>

            <div class="row d-none d-md-flex">
                <div class="col-md-9 product-carousel-wraper">
                    <div class="overflow-hidden">

                        <div id="product-carousel-on-sale" class="product-carousel-on-sale row mx-auto">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php
                                while ($q->have_posts()) : $q->the_post();
                                    global $product;
                                ?>
                                    <div class="swiper-slide">

                                        <?php
                                        wc_get_template_part('content', 'product');
                                        ?>

                                    </div>
                                <?php
                                endwhile;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-danger d-flex flex-column justify-content-around align-items-center  w-100 h-100 radius text-white px-3 pt-3 text-center">
                        <h3>
                            پیشنهادات <br />
                            تخفیف دار
                        </h3>
                        <?php
                        if ($settings['image']) {

                            echo '<img class="w-75" src="' . $settings['image']['url'] . '">';
                        }
                        ?>



                        <a href="<?php echo get_permalink(wc_get_page_id('shop')) . '?onsale';  ?>" class="app_woo_onsale_widget_button btn btn-block btn-outline-light px-2 py-2 d-block my-2 radius">ادامه</a>
                    </div>
                </div>
            </div>
            <div class="d-md-none">
                <div class="container p-0 product-carousel-wraper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-danger w-100 h-100 radius px-3 pt-5 text-center">
                                <h3 class="mb-4 text-white">پیشنهادات تخفیف دار</h3>
                                <div class="col-md-12">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-carousel-on-sale">
                                        <div class="swiper-wrapper">

                                            <?php
                                            while ($q->have_posts()) : $q->the_post();
                                                global $product;
                                            ?>
                                                <div class="swiper-slide">

                                                    <?php
                                                    wc_get_template_part('content', 'product');
                                                    ?>
                                                </div>
                                            <?php
                                            endwhile;
                                            ?>

                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>

                                <a href="<?php echo get_permalink(wc_get_page_id('shop')) . '?onsale';  ?>" class="app_woo_onsale_widget_button btn btn-block btn-outline-light px-2 py-2 d-block my-2 radius">مشاهده همه</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php

        }


        ?>
<?php

    }
}
