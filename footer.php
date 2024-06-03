<?php get_template_part('partials/modal', 'contact'); ?>

<footer id="footer">
    <div id="lightbox" class="lightbox">
        <div class="lightbox-content">
            <!--<span class="close-lightbox">&times;</span>
            <img id="lightbox-images" src="" alt="">
            <div class="lightbox-infos">
                <p id="image-lightbox-infos"></p>
                <div class="lightbox-navigation">
                    <button id="image-precedente">&lt;</button>
                    <button id="image-suivante">&gt;</button>
                </div>
            </div>-->
        </div>
    </div>

    <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>