<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (!is_front_page()) : ?>
    <header class="entry-header">
      <?php // get_template_part('template-parts/header/entry-header'); 
      ?>
      <?php the_post_thumbnail(); ?>
    </header>
  <?php elseif (has_post_thumbnail()) : ?>
    <header class="entry-header">
      <?php the_post_thumbnail(); ?>
    </header>
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>