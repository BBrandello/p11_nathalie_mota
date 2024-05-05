<?php

get_header();

/* Start the Loop */
while (have_posts()):
	the_post();
	?>

	<h1><?php the_title(); ?></h1>
	<p>Référence : <?php the_field('reference'); ?></p>

	<p>Catégorie :
		<?php
		$categories = get_the_terms(get_the_ID(), 'categorie');
		if ($categories && !is_wp_error($categories)) {
			$categories_names = array();
			foreach ($categories as $categorie) {
				$categories_names[] = $categorie->name;
			}
			echo implode(', ', $categories_names);
		}
		?>
	</p>

	<p>Format : <?php
	$formats = get_the_terms(get_the_ID(), 'format');
	if ($formats && !is_wp_error($formats)) {
		$formats_names = array();
		foreach ($formats as $format) {
			$formats_names[] = $format->name;
		}
		echo implode(', ', $formats_names);
	}
	?>
	</p>

	<p>Type : <?php the_field('type'); ?></p>
	<p>Année : <?php echo get_the_date('Y'); ?></p>
	<?php the_content(); ?>

	<?php
endwhile; // End of the loop.

get_footer();
?>