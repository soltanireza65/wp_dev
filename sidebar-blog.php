<?php if (!is_active_sidebar('sidebar_blog')) {
    return;
} ?>
<aside id="sidebar_blog" class="sidebar sidebar_blog">
    <?php dynamic_sidebar('sidebar_blog'); ?>
</aside>