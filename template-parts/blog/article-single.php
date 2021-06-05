<article id="post-<?php the_ID(); ?>" <?php post_class(' px-0 blog-article-single'); ?>>
    <div class="image-wrapper">
        <?php
        the_post_thumbnail(
            'medium',
            [
                'class' => 'img-responsive responsive--full',
                'title' => get_the_title(),
                'alt' =>   get_the_title()
            ]
        );
        ?>
    </div>
    <div class="content-wrapper ">
        <a class="blog-article-listitem--inner" rel="bookmark" href="<?php echo esc_url(get_permalink()) ?>">
            <h1 class="entry-title text-right">
                <?php echo get_the_title() ?>
            </h1>
        </a>
        <p class="post-content excerpt text-right"><?php echo get_the_content() ?></p>
        <div class="d-flex ">

            <?php
            echo  get_the_author();
            the_date();
            the_author();
            the_category();
            the_tags();
            ?>
            <a href="<?php comments_link(); ?>" title="Leave a comment">Comments</a>
        </div>
        <?php

        if (comments_open() || get_comments_number()) :
            echo '<div class="post-comments post-wg">';
            comments_template();
            echo '</div>';
        endif;
        ?>
    </div>
</article>