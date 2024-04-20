<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header">
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie_mota_logo.png" alt="Logo">
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
    </header>

    <?php wp_body_open(); ?>