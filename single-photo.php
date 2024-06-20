<?php

get_header();

/* Start the Loop */
while (have_posts()):
	the_post();
	?>

	<section id="single-photo">
		<div class="description-photo-single-photo">
			<div class="description-single-photo">
				<h2><?php the_title(); ?></h2>
				<div class="text-description-single-photo">
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
				</div>
			</div>
			<div class="photo-single-photo">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="preview-contact-single-photo">
			<div class="contact-single-photo">
				<p>Cette photo vous intéresse ?</p>
				<button class="btn-contact-single-photo" data-reference="<?php the_field('reference'); ?>">Contact</button>
			</div>
			<div class="preview-single-photo">
				<?php get_template_part('partials/preview', 'single-photo'); ?>
			</div>
		</div>

		<h3>Vous aimerez aussi</h3>
		<div class="photos-apparentes">
			<?php
			set_query_var('categorie', $categories);
			get_template_part('partials/photos', 'apparentes-single-photo'); ?>
		</div>
	</section>

	<?php
endwhile; // End of the loop.

get_footer();
?>