<?php

/**
 * Template part for displaying card-like content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-card__article'); ?>>
  <header class="content-card__header">
    <?php the_post_thumbnail('archives', array('class' => 'content-card__img')); ?>
    <?php the_title(sprintf('<h2 class="content-card__title header-loudish"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    <p class="content-card__meta">
      <?php echo get_the_date(); ?> by <?php echo pc_get_author_name(); ?>
    </p>
  </header>
  <div class="content-card__body content">
    <?php the_content('Read More'); ?>
  </div>
</article>