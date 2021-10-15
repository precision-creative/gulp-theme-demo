<?php

/**
 * Template part for displaying generic content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content__article'); ?>>
  <header class="content__header">
    <?php if (is_singular()) : ?>
      <?php the_title('<h1 class="content__title">', '</h1>'); ?>
    <?php else : ?>
      <?php the_title(sprintf('<h2 class="content__title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    <?php endif; ?>

    <?php the_post_thumbnail(); ?>
  </header>
  <div class="content__body content">
    <?php the_content('Read More'); ?>
  </div>
  <div class="content__footer">
    Footer
  </div>
</article>