<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package precisioncreative
 */

get_header();

/* Start the Loop */
while (have_posts()) :
	the_post();
	if (function_exists('is_account_page') && is_account_page()) {
		get_template_part('template-parts/content/content', 'account');
	} else if (function_exists('is_cart') && is_cart()) {
		get_template_part('template-parts/content/content', 'cart');
	} else {
		get_template_part('template-parts/content/content', 'page');
	}
endwhile; // End of the loop.

get_footer();
