<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package precisioncreative
 */

?>

<main class="single__container">
  <article id="post-<?php the_ID(); ?>" <?php post_class('single__article'); ?>>
    <header class="single__header">
      <?php the_title('<h1 class="single__title">', '</h1>'); ?>
      <p class="single__date">
        <?php the_date(); ?>
      </p>
      <?php the_post_thumbnail('full', array('class' => 'single__thumbnail')); ?>
    </header>
    <div class="single__content">
      <?php the_content(); ?>
    </div>
  </article>
</main>