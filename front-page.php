<?php

/**
 * Template Name: Front Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('container_width');
?>

<main id="single">
	<div class="<?php echo $container; ?>">
		<div class="row">
			<div class="col">
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('template-parts/content/content', 'page'); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :

						comments_template();

					endif;
					?>

				<?php endwhile; // end of the loop. 
				?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>