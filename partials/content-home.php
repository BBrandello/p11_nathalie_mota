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
                    <option value="filtre-categorie-reception">Réception</option>
                    <option value="filtre-categorie-mariage">Mariage</option>
                    <option value="filtre-categorie-concert">Concert</option>
                    <option value="filtre-categorie-television">Télévision</option>
                </select>

                <select id="filtre-format">
                    <option value="">Formats</option>
                    <option value="filtre-format-paysage">Paysage</option>
                    <option value="filtre-format-portrait">Portrait</option>
                </select>
            </div>

            <div>
                <select id="filtre-date">
                    <option value="date-recente">Plus récentes</option>
                    <option value="date-ancienne">Plus anciennes</option>
                </select>
            </div>
        </div>

        <?php
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1, // Récupérer tous les articles
        );

        $articles = get_posts($args);

        // Vérifie s'il y a des articles
        if ($articles) {
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
</article>