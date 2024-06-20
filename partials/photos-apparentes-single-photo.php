<div class="related-photos">
    <?php

    $categories = get_query_var('categorie');
    if ($categories && !is_wp_error($categories)) {

        $category_ids = wp_list_pluck($categories, 'term_id');

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 2,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'term_id',
                    'terms' => $category_ids,
                ),
            ),
        );

        get_template_part('partials/affichage-articles', null, array('args' => $args));
    }
    ?>
</div>