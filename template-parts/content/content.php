<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <?php if (is_singular()) : ?>
      <?php the_title('<h2>', '</h2>'); ?>
    <?php else : ?>
      <?php the_title(sprintf('<h2 class=""><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    <?php endif; ?>

    <?php the_post_thumbnail(); ?>
  </header>

  <div>
    <?php
    the_excerpt();

    wp_link_pages(array(
      'before'   => '<nav class="page-links">',
      'after'    => '</nav>',
      'pagelink' => 'Page %',
    ));

    ?>
  </div>

  <!-- <footer class="entry-footer default-max-width">
      <?php // twenty_twenty_one_entry_meta_footer(); 
      ?>
    </footer> -->
</article>