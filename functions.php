<?php

function nathalie_mota_register_styles_and_scripts()
{
    // Enregistrement des styles CSS
    wp_enqueue_style('style_body_header_footer', get_template_directory_uri() . '/scss/style_body_header_footer.css', array(), '1.0');
    wp_enqueue_style('style_modal_contact', get_template_directory_uri() . '/scss/modal-contact.css', array(), '1.0');
    wp_enqueue_style('style_menu_burger_header', get_template_directory_uri() . '/scss/menu-burger-header.css', array(), '1.0');
    wp_enqueue_style('style_single_photo', get_template_directory_uri() . '/scss/style-single-photo.css', array(), '1.0');

    //Enregistrement jQuery
    wp_enqueue_script('jquery');

    // Enregistrement du script JavaScript modale
    wp_register_script('modal-script', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true);

    // Chargement du script JavaScript moofale
    wp_enqueue_script('modal-script');
}

add_action('wp_enqueue_scripts', 'nathalie_mota_register_styles_and_scripts');


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