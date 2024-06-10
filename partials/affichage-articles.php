<?php

$args = $args['args'];

$articles = new WP_Query($args);

// Vérifie s'il y a des articles
if ($articles->have_posts()) {
    // Affiche les articles
    echo '<div class="photos-home-header">';
    while ($articles->have_posts()) {
        $articles->the_post();
        get_template_part('partials/detail-content-home');
    }
    echo '</div>';
    wp_reset_postdata();
} else {
    echo 'Aucun article trouvé.';
}