<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- <pre> -->
    <?php
    // print_r(_themename_get_option('opt_shop_background', '#f0f0f1'));
    ?>
    <!-- </pre> -->

    <?php wp_body_open(); ?>
    <!-- <div id="page" class="site"> -->
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', '_themename'); ?></a>
    <?php
    if (wp_is_mobile()) {
        get_template_part('template-parts/header/header', 'mobile');
    } else {
        get_template_part('template-parts/header/header', 'desktop');
    }
    ?>
    <div id="page" class="site mx-auto rounded-2 mb-5">
        <a class="skip-link screen-reader-text d-none" href="#primary"><?php esc_html_e('Skip to content', '_themename'); ?></a>