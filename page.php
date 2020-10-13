<?php

/**
 * Default page template 
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod('container_width');
?>

<main id="page">
	<div class="<?php echo $container; ?>">
		<div class="row">
			<div class="col-12">
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('loop-templates/content', 'page'); ?>

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