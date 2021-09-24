<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PrecisionCreative
 */

get_header(); ?>

<main id="archive" class="archives">
	<div class="archives__container">

		<?php if (have_posts()) : ?>
			<div class="archives__grid">
				<?php while (have_posts()) : the_post();
					get_template_part('template-parts/content', get_post_format());
				endwhile; ?>
			</div>
		<?php else :
			get_template_part('template-parts/content', 'none');
		endif; ?>
	</div>
</main>

<?php get_footer(); ?>