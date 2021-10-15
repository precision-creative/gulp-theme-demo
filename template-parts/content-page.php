<?php

/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<main class="content-page">
  <div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(array('content-page__article')); ?>>
      <header class="content-page__header">
        <?php the_title('<h1 class="content-page__title header-louder">', '</h1>'); ?>
        <?php the_post_thumbnail('container', array('class' => 'content-page__thumbnail')); ?>
      </header>
      <div class="content-page__content content">
        <?php the_content(); ?>
      </div>
    </article>
  </div>
</main>