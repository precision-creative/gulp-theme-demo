<?php

/**
 * Template Name: Search Page
 * 
 * The template for displaying the search page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package precisioncreative
 */

?>

<?php get_header(); ?>

<div class="search">
  <div class="search__container container-sm">
    <h1 class="search__title">Search <?php echo get_bloginfo('name'); ?></h1>
    <?php get_search_form(); ?>
  </div>
</div>

<?php get_footer(); ?>