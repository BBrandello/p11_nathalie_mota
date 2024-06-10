<?php

// Affiche le champ personnalisé 'reference'
echo '<div>';
the_field('reference');
echo '</div>';

// Récupère et affiche les catégories
echo '<div>';
$categories = get_the_terms(get_the_ID(), 'categorie');
if ($categories && !is_wp_error($categories)) {
    $categories_names = array();
    foreach ($categories as $categorie) {
        $categories_names[] = $categorie->name;
    }
    echo implode(', ', $categories_names);
}
echo '</div>';