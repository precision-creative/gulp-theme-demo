<?php

/**
 * The main home page template file. 
 * 
 * This is often used for the blog index page rather than the homepage...
 * Think of it as the blog posts "home" page
 */

get_header(); ?>

<div class="home-index__container">
  <?php if (have_posts()) : ?>
    <main class="home-index">
      <?php while (have_posts()) :
        the_post();
        get_template_part('template-parts/content/content', 'preview');
      endwhile; ?>
    </main>
  <?php
    pc_posts_naviation();
  else :
    get_template_part('template-parts/content/content', 'none');
  endif; ?>
</div>
<?php get_footer();
