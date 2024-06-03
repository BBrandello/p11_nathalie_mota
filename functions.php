<?php

function nathalie_mota_register_styles_and_scripts()
{
    // Enregistrement des styles CSS
    wp_enqueue_style('style_body_header_footer', get_template_directory_uri() . '/scss/style_body_header_footer.css', array(), '1.0');
    wp_enqueue_style('style_modal_contact', get_template_directory_uri() . '/scss/modal-contact.css', array(), '1.0');
    wp_enqueue_style('style_menu_burger_header', get_template_directory_uri() . '/scss/menu-burger-header.css', array(), '1.0');
    wp_enqueue_style('style_single_photo', get_template_directory_uri() . '/scss/style-single-photo.css', array(), '1.0');
    wp_enqueue_style('style_content_home', get_template_directory_uri() . '/scss/style-content-home.css', array(), '1.0');
    wp_enqueue_style('style_lightbox', get_template_directory_uri() . '/scss/lightbox.css', array(), '1.0');

    // Enregistrement jQuery
    wp_enqueue_script('jquery');

    // Enregistrement du script JavaScript modal
    wp_register_script('modal-script', get_template_directory_uri() . '/js/modale.js', array(), '1.0', true);
    wp_enqueue_script('modal-script');

    // Enregistrement du script JavaScript des filtres
    wp_enqueue_script('filtres', get_template_directory_uri() . '/js/filtres.js', array('jquery'), '1.0', true);

    //Enregistrement du script JavaScript du load-more de la page d'accueil
    wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more-content-home.js', array('jquery'), '1.0', true);

    //Enregistrement du script JavaSript de la lightbox
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0', true);

    // Passer des variables PHP vers JavaScript
    wp_localize_script(
        'filtres',
        'ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'filter_nonce' => wp_create_nonce('filter_nonce'),
            'load_more_nonce' => wp_create_nonce('load_more_nonce')
        )
    );
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

// Fonction pour filtrer les articles
function filtres_articles()
{
    // Vérification du nonce de sécurité
    check_ajax_referer('filter_nonce', 'nonce');

    // Récupération des valeurs des filtres
    $categories = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    // Arguments de la requête pour WP_Query
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => 1,
    );

    // Ajoutez des conditions pour filtrer en fonction des valeurs des filtres
    if ($categories) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie', // Utilisation du slug de la taxonomie des catégories
            'field' => 'slug',
            'terms' => $categories,
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format', // Utilisation du slug de la taxonomie de format
            'field' => 'slug',
            'terms' => $format,
        );
    }

    // Ajouter une condition pour trier par date
    if ($date === 'date-recente') {
        $args['orderby'] = 'date'; // Tri par date
        $args['order'] = 'DESC'; // Plus récent d'abord
    } elseif ($date === 'date-ancienne') {
        $args['orderby'] = 'date'; // Tri par date
        $args['order'] = 'ASC'; // Plus ancien d'abord
    }

    // Effectuer la requête pour récupérer les articles filtrés
    $query = new WP_Query($args);

    // Afficher les articles ou un message si aucun article n'est trouvé
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            if ($image) {
                echo '<a href="' . esc_url(get_permalink()) . '"><img src="' . esc_url($image) . '" alt="' . get_the_title() . '"></a>';
            }
        }
        wp_reset_postdata();
    } else {
        echo 'Aucun article trouvé.';
    }

    // Terminer la requête AJAX
    wp_die();
}

// Ajouter une action pour gérer la requête AJAX
add_action('wp_ajax_filter_posts', 'filtres_articles');
add_action('wp_ajax_nopriv_filter_posts', 'filtres_articles');

// Fonction pour charger plus d'articles
function charger_plus_articles()
{
    check_ajax_referer('load_more_nonce', 'nonce');

    $paged = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;
    $categories = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8, // Charger 8 articles à la fois
        'paged' => $paged, // Page actuelle
    );

    if ($categories) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie', // Utilisation du slug de la taxonomie des catégories
            'field' => 'slug',
            'terms' => $categories,
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format', // Utilisation du slug de la taxonomie de format
            'field' => 'slug',
            'terms' => $format,
        );
    }

    if ($date == 'date-recente') {
        $args['order'] = 'DESC';
    } elseif ($date == 'date-ancienne') {
        $args['order'] = 'ASC';
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            if ($image) {
                echo '<a href="' . esc_url(get_permalink()) . '"><img src="' . esc_url($image) . '" alt="' . get_the_title() . '"></a>';
            }
        }
        wp_reset_postdata();
    } else {
        echo '';
    }

    wp_die();
}

// Ajouter une action pour gérer la requête AJAX
add_action('wp_ajax_load_more_posts', 'charger_plus_articles');
add_action('wp_ajax_nopriv_load_more_posts', 'charger_plus_articles');