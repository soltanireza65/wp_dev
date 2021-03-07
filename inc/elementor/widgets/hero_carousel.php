<?php

class HeroCarouselWidget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hero_carousel';
    }

    public function get_title() {
        return __('کروسل هیرو', '_themename');
    }

    public function get_icon() {
        return 'fa fa-code';
    }

    public function get_categories() {
        return ['pypracts'];
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('محتوای کروسل', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();



        $repeater->add_control(
            'image',
            [
                'label' => __('افزودن تصویر', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'images',
            [
                'label' => __('تصاویر کروسل', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['images']) {
            $images = $settings['images'];

?>
            <div class="hero_carousel overflow-hidden">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    <?php
                    foreach ($images as $image) {
                        // print_r($image);
                        // echo $image['_id'];
                        // echo $image['image']['url'];
                    ?>
                        <div class="swiper-slide w-100">
                            <div class="" style="background-image: url('<?php echo $image['image']['url'] ?>'); height: 300px; "></div>
                            <!-- <img class="" style="height: 280px" src="<?php echo $image['image']['url'] ?>" alt="" /> -->
                        </div>
                <?php
                    }
                }
                ?>

                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            <script>
                // jQuery(document).ready(function() {
                //     const swiper = new Swiper('.hero_carousel', {
                //         loop: true,

                //         // Navigation arrows
                //         navigation: {
                //             nextEl: '.swiper-button-next',
                //             prevEl: '.swiper-button-prev',
                //         },
                //     });
                // });
            </script>
    <?php
    }
}
