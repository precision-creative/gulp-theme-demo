<?php

/**
 * Template part for displaying post excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
  <header class="content__header">
    <?php the_post_thumbnail(); ?>
    <?php the_title('<h2 class="content__title">', '</h2>'); ?>
  </header>
  <div class="content__excerpt">
    <?php the_excerpt(); ?>
  </div>
  <div class="content__footer">
    <a href="<?php echo get_the_permalink(); ?>">Read More</a>
  </div>
</article>