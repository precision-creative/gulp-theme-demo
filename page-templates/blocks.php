<?php

/**
 * Template Name: Blocks
 *
 * This template can be used to add blocks to the page using ACF Flexible content
 *
 * @package PrecisionCreative
 */

get_header(); ?>

<?php if (have_posts()) : ?>
	<main class="blocks">
		<?php while (have_posts()) : the_post();
			get_template_part('template-parts/content', 'blocks');
		endwhile; ?>
	</main>
<?php endif; ?>

<?php get_footer(); ?>