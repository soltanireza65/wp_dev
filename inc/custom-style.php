<?php

function css_option() {
?>
    <style>
        body {
            background: <?php echo _themename_get_option('opt_shop_background', '#f0f0f1'); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'css_option', 100);
?>