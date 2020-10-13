<?php

/**
 * The template for displaying all single posts.
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('container_width');
?>

<main id="single">
  <div class="<?php echo $container; ?>">
    <div class="row">
      <div class="col">
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <header class="entry-header">
            <?php the_title('<h1 class="entry__title">', '</h1>'); ?>
            <?php posted_on(); ?>
          </header>
          <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
          <div class="entry__content">
            <?php the_content(); ?>
          </div>
          <footer class="entry-footer">
            <?php understrap_entry_footer(); ?>
          </footer>
        </article>
      </div>
    </div>
  </div>
</main>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>