<?php
$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
// Vérifie si l'image existe
if ($image) {
    // Affiche l'image avec le lien vers l'article
    echo '<a href="' . esc_url(get_permalink()) . '">';
    echo '<i class="fa-solid fa-expand"></i>';
    echo '<img src="' . esc_url($image) . '" alt="' . esc_attr(get_the_title()) . '">';
    echo '<i class="fa-regular fa-eye"></i>';
    echo '<div class="titre-cat-hover-single-photo">';

    get_template_part('partials/title-ref-cat-hover-single-photo');

    echo '</div>';
    echo '</a>';
}