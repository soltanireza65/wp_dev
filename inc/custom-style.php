<?php

function css_option() {
?>
    <style>
        body {
            background-image: url("<?php echo _themename_get_option('opt_shop_background', '#f0f0f1')['background-image']['url']; ?>");
            background-color: <?php echo _themename_get_option('opt_shop_background', '#f0f0f1')['background-color']; ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'css_option', 100);
?>