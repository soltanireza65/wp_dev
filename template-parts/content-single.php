<div class="blog_page container">
    <div class="row blog_inner">
        <main id="primary" class="blog-main  col-9">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/blog/article', 'single');
                }
            }
            wp_reset_postdata();
            ?>
        </main>
        <aside id="sidebar" class="sidebar col-3">
            <?php get_sidebar('blog'); ?>
        </aside>
    </div>
</div>