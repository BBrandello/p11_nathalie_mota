<article class="article-content-home">
    <div class="photo-event-header">
        <img src="<?php echo get_template_directory_uri(); ?>/images/img-header/photo-event-header.png"
            alt="Photo Event">
    </div>

    <div class="filtres-articles-content-home">
        <div class="filtres">
            <div class="left-filtres-categorie">
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