<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package precisioncreative
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header alignwide">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php the_post_thumbnail(); ?>
  </header>

  <div class="entry-content">
    <?php
    the_content();
    ?>
  </div>

</article>