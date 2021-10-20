<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

global $wp_query;
$total_results = $wp_query->found_posts;

get_header();
?>

<main class="search-results">
  <div class="container">
    <p class="search-results__count">Showing <?php echo $total_results; ?> results.</p>
    <?php if (have_posts()) : ?>
      <header class="search-results__header">
        <h1 class="search-results__title header-loud">
          Search Results for "<span class="search-results__query"><?php echo get_search_query(); ?></span>"
        </h1>
      </header>
      <div class="search-results__grid">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/content', 'card'); ?>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
