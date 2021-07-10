<?php

/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<div class="page-content">
  <article id="post-<?php the_ID(); ?>" <?php post_class('page-content__container'); ?>>
    <header class="page-content__header">
      <?php the_title('<h1 class="page-content__title">', '</h1>'); ?>
      <?php the_post_thumbnail(); ?>
    </header>
    <main class="page-content__main">
      <?php the_content(); ?>
    </main>
  </article>
</div>