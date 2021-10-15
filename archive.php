<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PrecisionCreative
 */

get_header(); ?>

<main class="archive">
	<div class="container">
		<?php if (have_posts()) : ?>
			<div class="archive__grid">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content', 'card'); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>