<?php

// The template for displaying all single posts.

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header('');
?>


<div class="wrapper" id="single-wrapper">

  <div class="container" id="content">
    <div class="row">

      <!-- Do the left sidebar check -->
      <?php get_template_part('global-templates/left-sidebar-check'); ?>

      <main class="single" id="main">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <header class="entry-header">
                  <?php the_title('<h1 class="entry__title" style="text-align: center; margin: 3rem 0 .1rem 0; font-weight: 700; font-size: 32px; color: var(--primary-accent);">', '</h1>'); ?>
                  <p id="author" class="author">Posted On <?php the_time('F jS, Y'); ?></p>
                </header>
                <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                <div class="entry__content">
                  <?php if (have_posts()) : while (have_posts()) : the_post();
                      the_content();
                    endwhile;
                  else : ?>
                  <?php endif; ?>
                </div>
                <footer class="entry-footer">
                  <?php //understrap_entry_footer(); 
                  ?>
                </footer>
              </article>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
<?php get_footer(); ?>