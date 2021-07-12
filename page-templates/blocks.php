<?php

/**
 * Template Name: Blocks
 *
 * This template can be used to add blocks to the page using ACF Flexible content
 *
 * @package PrecisionCreative
 */

get_header();

while (have_posts()) : the_post();
	get_template_part('template-parts/content', 'blocks');
endwhile;

get_footer();
