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

<main class="search">
  <div class="container">
    <h1 class="search__title header-loudish">Search <?php echo get_bloginfo('name'); ?></h1>
    <?php get_search_form(); ?>
  </div>
</main>

<?php get_footer(); ?>