<article class="article-content-home">
    <div class="photo-event-header">
        <img src="<?php echo get_template_directory_uri(); ?>/images/img-header/photo-event-header.png"
            alt="Photo Event">
    </div>

    <div class="filtres-articles-content-home">
        <div class="filtres">
            <div>
                <select id="filtre-categories">
                    <option value="">Catégories</option>
                    <option value="reception">Réception</option>
                    <option value="mariage">Mariage</option>
                    <option value="concert">Concert</option>
                    <option value="television">Télévision</option>
                </select>

                <select id="filtre-formats">
                    <option value="">Formats</option>
                    <option value="paysage">Paysage</option>
                    <option value="portrait">Portrait</option>
                </select>
            </div>

            <div>
                <select id="filtre-dates">
                    <option value="date-recente">Plus récentes</option>
                    <option value="date-ancienne">Plus anciennes</option>
                </select>
            </div>
        </div>

        <?php
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 8,
            'paged' => 1,
        );

        $articles = new WP_Query($args);

        // Vérifie s'il y a des articles
        if ($articles->have_posts()) {
            // code à exécuter si des articles sont trouvés
            echo '<div class="photos-home-header">';
            foreach ($articles as $post) {
                setup_postdata($post);
                $image = get_the_post_thumbnail_url($post, 'full');
                if ($image) {
                    echo '<a href="' . esc_url(get_permalink()) . '"><img src="' . esc_url($image) . '" alt="' . get_the_title() . '"></a>';
                }
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            // code à exécuter si aucun article n'est trouvé
            echo 'Aucun article trouvé.';
        }
        ?>
    </div>
    <button id="charger-plus-content-home" data-page="1">Charger plus</button>
</article>