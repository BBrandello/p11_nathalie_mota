<div class="related-photos">
    <?php

    $categories = get_query_var('categories');
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

        $related_query = new WP_Query($args);

        if ($related_query->have_posts()) {
            echo '<div class="related-photos-item">';
            while ($related_query->have_posts()) {
                $related_query->the_post();
                ?>
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="related-photos-thumbnail">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php } ?>
                </a>
                <?php
            }
            echo '</div>';

            wp_reset_postdata();
        } else {
            echo '<p>Aucune photo de la même catégorie trouvée.</p>';
        }
    }
    ?>
</div>