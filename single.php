<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<main class="single">
  <div class="container">
    <?php if (have_posts()) :
      while (have_posts()) : the_post();
        get_template_part('template-parts/content', 'single');
      endwhile;
    endif; ?>
  </div>
</main>

<?php
get_footer();
