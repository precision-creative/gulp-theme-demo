<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package precisioncreative
 */

get_header(); ?>

<div class="woo-container">
  <?php woocommerce_content(); ?>
</div>

<?php get_footer();
