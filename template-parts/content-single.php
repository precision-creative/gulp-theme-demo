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
  <div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(array('content-single__article')); ?>>
      <header class="content-single__header">
        <?php the_title('<h1 class="content-single__title header-louder">', '</h1>'); ?>
        <p class="content-single__meta">
          By <?php echo pc_get_author_name(); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php the_date(); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php the_category(', '); ?>
        </p>
        <?php the_post_thumbnail('container', array('class' => 'content-single__thumbnail')); ?>
      </header>
      <main class="content-single__content content">
        <?php the_content(); ?>
      </main>
    </article>
  </div>
</div>