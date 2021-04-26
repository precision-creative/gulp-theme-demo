<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-preview'); ?>>
  <?php if (get_the_post_thumbnail()) : ?>
    <div class="post-preview__thumbnail">
      <?php echo the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>

  <div class="post-preview__text">
    <header class="post-preview__header">
      <?php the_title(sprintf('<h2 class=""><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header>

    <div class="post-preview__excerpt">
      <?php the_excerpt(); ?>
    </div>
  </div>
</article>