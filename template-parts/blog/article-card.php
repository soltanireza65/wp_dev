<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(' px-0 blog-article-card'); ?>>
    <a class="posttion-relative blog-article-card--inner" rel="bookmark" href="<?php echo esc_url(get_permalink()) ?>">
        <div class="image-wrapper">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" class="attachment-medium_large size-medium_large" alt="" loading="lazy" srcset="" sizes="">
        </div>
        <div class="item__title position-absolute">
            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        </div>
    </a>
</article> -->
<div class="swiper-slide">
    <article id="post-<?php the_ID(); ?>" <?php post_class(' px-0 blog-article-card'); ?>>
        <a class="posttion-relative blog-article-card--inner" rel="bookmark" href="<?php echo esc_url(get_permalink()) ?>">
            <div class="image-wrapper">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" class="attachment-medium_large size-medium_large" alt="" loading="lazy" srcset="" sizes="">
            </div>
            <div class="item__title position-absolute d-flex justify-content-end align-items-center h-100">
                <?php the_title('<h2 class="entry-title text-center">', '</h2>'); ?>
            </div>
        </a>
    </article>
</div>