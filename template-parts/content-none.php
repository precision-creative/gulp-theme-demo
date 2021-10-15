<?php

/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
} ?>

<article <?php echo post_class(array('content-none__article')); ?>>
  <header class="content-none__header">
    <h1 class="content-none__title header-louder">Nothing Found</h1>
  </header>
  <div class="content-none__content content">
    <?php if (is_search()) : ?>
      <p>Sorry, but nothing matched your search. Please try again with diffent wording.</p>
      <?php get_search_form(); ?>
    <?php else : ?>
      <p>It seems we can't find what you're looking for. Maybe try a search?</p>
      <?php get_search_form(); ?>
    <?php endif; ?>
  </div>
</article>