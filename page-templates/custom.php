<?php

/**
 * Template Name: Custom Template
 *
 * This template can be used to override the default template setup
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<main class="custom">
	<div class="custom__container container">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'page'); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>