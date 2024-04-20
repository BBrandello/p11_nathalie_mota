<?php

function nathalie_mota_register_styles()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style_body_header_footer.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'nathalie_mota_register_styles');

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

// Ajout des menus dans le header et le footer
register_nav_menus(
    array(
        'main' => 'Menu Principal',
        'footer' => 'Bas de page',
    )
);