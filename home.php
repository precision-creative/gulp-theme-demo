<?php

/**
 * The main home page template file
 * 
 * This is often used for the blog index page rather than the homepage...
 * Think of it as the blog posts "home" page
 */

?>

<?php get_header(); ?>

<main class="blog-home">
  <div class="blog-home__container">
    <?php if (have_posts()) : ?>
      <div class="blog-home__grid">
        <?php
        while (have_posts()) : the_post();
          get_template_part('template-parts/content');
        endwhile;
        ?>
      </div>
      <?php pc_posts_naviation(); ?>
    <?php else : ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>