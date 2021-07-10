<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package precisioncreative
 */

?>

<div class="single">
  <article id="post-<?php the_ID(); ?>" <?php post_class('single__container'); ?>>
    <header class="single__header">
      <?php the_title('<h1 class="single__title">', '</h1>'); ?>
      <p class="single__date">
        <?php the_date(); ?>
      </p>
      <?php the_post_thumbnail('large', array('class' => 'single__thumbnail')); ?>
    </header>
    <main class="single__content">
      <?php the_content(); ?>
    </main>
  </article>
</div>