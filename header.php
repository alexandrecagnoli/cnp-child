<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri() ?>/images/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/images/favicon//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/images/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/images/favicon//favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri() ?>/images/favicon//site.webmanifest">
    <link rel="mask-icon" href="<?= get_template_directory_uri() ?>/images/favicon//safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php wp_head(); ?>
    <?php $logo = get_logo(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="mast-head">
        <nav class="main-nav container">
            <a href="<?php echo home_url(); ?>" class="logo"><img src="<?= $logo['url']; ?>" alt="Logo"></a>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => 'ul',
            )); ?>
            <button class="hamburger hamburger--emphatic" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <?php
            if (is_user_logged_in()) {
                $link = '/contenus-prives';
                $text = 'Accès membre';
            } else {
                $link = '/login';
                $text = 'Connexion';
            }
            ?>
            <a class="btn btn-orange-secondary" href="<?php echo $link; ?>"><?php echo $text; ?></a>
        </nav>
    </header>
    <main>