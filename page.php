<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package precisioncreative
 */

?>

<?php get_header(); ?>

<?php
if (have_posts()) :
	while (have_posts()) : the_post();
		if (
			function_exists('is_account_page') && is_account_page() ||
			function_exists('is_cart') && is_cart() ||
			function_exists('is_checkout') && is_checkout() ||
			function_exists('is_shop') && is_shop()
		) {
			get_template_part('template-parts/content', 'woo');
		} else {
			get_template_part('template-parts/content', 'page');
		}
	endwhile;
endif;
?>

<?php get_footer(); ?>
