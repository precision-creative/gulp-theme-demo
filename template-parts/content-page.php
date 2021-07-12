<?php

/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<div class="content-page">
  <article id="post-<?php the_ID(); ?>" <?php post_class('content-page__container'); ?>>
    <header class="content-page__header">
      <?php the_title('<h1 class="content-page__title">', '</h1>'); ?>
      <?php the_post_thumbnail('large', array('class' => 'content-page__thumbnail')); ?>
    </header>
    <main class="content-page__main">
      <?php the_content(); ?>
    </main>
  </article>
</div>