<article class="article-content-home">
    <div class="photo-event-header">
        <img src="<?php echo esc_url('/wp-content/uploads/2024/04/photo-event-header.png'); ?>" alt="Photo Event">
    </div>

    <div class="filtres-articles-content-home">
        <div class="filtres">
            <div class="left-filtres-categorie">
                <select id="filtre-categories">
                    <option value="">Catégories</option>
                    <?php
                    $terms = get_terms('categorie');

                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                        }
                    }
                    ?>
                </select>

                <select id="filtre-formats">
                    <option value="">Formats</option>
                    <?php
                    $formats = get_terms('format');

                    if (!empty($formats) && !is_wp_error($formats)) {
                        foreach ($formats as $format) {
                            echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="right-filtres-categorie">
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

        get_template_part('partials/affichage-articles', null, array('args' => $args));
        ?>
    </div>
    <button id="charger-plus-content-home" data-page="1">Charger plus</button>
</article>