<?php

//get_header();

get_header();

/* Start the Loop */
while (have_posts()):
	the_post();

	if (is_page('Accueil')) {
		// Si la page a le titre 'Accueil'
		get_template_part('partials/content-home'); // Chargez content-home.php
	} else {
		// Contenu par défaut pour toutes les autres pages
		get_template_part('partials/content-page');
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();