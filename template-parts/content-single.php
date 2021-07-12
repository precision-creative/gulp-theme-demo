<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package precisioncreative
 */

?>

<div class="content-single">
  <article id="post-<?php the_ID(); ?>" <?php post_class('content-single__container'); ?>>
    <header class="content-single__header">
      <?php the_title('<h1 class="content-single__title">', '</h1>'); ?>
      <p class="content-single__date">
        <?php the_date(); ?>
      </p>
      <?php the_post_thumbnail('large', array('class' => 'content-single__thumbnail')); ?>
    </header>
    <main class="content-single__content">
      <?php the_content(); ?>
    </main>
  </article>
</div>