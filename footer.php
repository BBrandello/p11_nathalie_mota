<?php get_template_part('partials/modal', 'contact'); ?>

<footer id="footer">
    <div id="lightbox" class="lightbox">
        <div class="lightbox-content">
            <div class="btn-img-infos-lightbox">
                <div class="btn-image-lightbox">
                    <div class="btn-text-prec-lightbox">
                        <i id="image-precedente" class="fa-solid fa-arrow-left-long lightbox-nav-btn"></i>
                        <p>Précédente</p>
                    </div>
                    <img id="lightbox-images" src="" alt="Lightbox Image">
                    <div class="btn-text-suiv-lightbox">
                        <i id="image-suivante" class="fa-solid fa-arrow-right-long lightbox-nav-btn"></i>
                        <p>Suivante</p>
                    </div>
                </div>
                <div id="image-lightbox-infos">
                    <?php get_template_part('partials/ref', 'cat-articles'); ?>
                </div>
            </div>
            <div class="close-lightbox"><i class="fa-solid fa-xmark"></i></div>
        </div>
    </div>

    <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>