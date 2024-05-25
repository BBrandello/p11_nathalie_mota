<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/8ec29322a2.js" crossorigin="anonymous"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header">
        <div class="content-header">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/img-header/nathalie_mota_logo.png"
                    alt="Logo">
            </a>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'container' => 'ul', // Afin d'éviter d'avoir une div autour
                    'menu_class' => 'site__header__menu', // class personnalisée
                )
            );
            ?>

            <div class="menu-burger-header">
                <div class="ligne-menu-burger-header barre-pour-croix-1"></div>
                <div class="ligne-menu-burger-header barre-pour-croix-2"></div>
                <div class="ligne-menu-burger-header barre-pour-croix-3"></div>
            </div>

            <div class="menu-burger-header-content">
                <?php get_template_part('partials/menu', 'burger-header'); ?>
            </div>
        </div>
    </header>

    <?php wp_body_open(); ?>