<?php

/**
 * Template Name: Blog Page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package PrecisionCreative
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<!-- The page content -->

<div class="container" id="content">
  <h1>Blog</h1>
  <?php

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 10
  );
  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) : ?>
    <ul class="grid">
      <?php
      while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <li class="grid__item post">
          <?php if (get_the_post_thumbnail()) : ?>
            <a href="<?php echo get_permalink(); ?>">
              <?php the_post_thumbnail('', array('class' => 'post__img')); ?>
            </a>
          <?php else : ?>
            <a href="<?php echo get_permalink(); ?>">
              <img class="post__img" src="https://via.placeholder.com/300x200?text=No%20Image">
            </a>
          <?php endif; ?>
          <h2 class="post__title"><?php echo the_title(); ?></h2>
          <?php if (get_the_date()) : ?>
            <p class="post__date"><?php echo get_the_date(); ?></p>
          <?php endif; ?>
          <?php the_excerpt(); ?>
        </li>
      <?php
      endwhile; ?>
    </ul>
  <?php
  else : ?>
    <p>No blog posts found! Please check back later.</p>
  <?php
  endif;

  wp_reset_postdata();
  ?>
</div><!-- .row end -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>