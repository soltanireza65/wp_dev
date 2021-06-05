<div class="blog_page container">
    <div class="row blog_inner">

        <div class="top-cards mb-5">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '6',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
            ?>
                <div class="container">
                    <div id="topPostsCarousel" class="topPostsCarousel overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part('template-parts/blog/article', 'card');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>

        </div>
        <main id="primary" class="blog-main  col-9">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/blog/article', 'listitem');
                }
                the_posts_navigation();
            }
            wp_reset_postdata();
            ?>
        </main>
        <aside id="sidebar" class="sidebar col-3">
            <?php get_sidebar('blog'); ?>
        </aside>
    </div>
</div>