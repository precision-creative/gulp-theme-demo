<?php

/**
 * The main home page template file
 * 
 * This is often used for the blog index page rather than the homepage...
 * Think of it as the blog posts "home" page
 */

?>

<?php get_header(); ?>

<main class="home">
  <div class="container">
    <h1 class="home__title header-louder">Blog Posts</h1>
    <?php if (have_posts()) : ?>
      <div class="home__grid">
        <?php while (have_posts()) : the_post();
          get_template_part('template-parts/content', 'card');
        endwhile; ?>
      </div>

      <?php pc_posts_naviation(); ?>
    <?php else : ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>