<?php

/**
 * Template part for displaying WooCommerce pages from conditional in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<main class="content-woo">
  <div class="container">
    <header class="content-woo__header">
      <h1 class="content-woo__title header-louder"><?php echo get_the_title(); ?></h1>
    </header>
    <?php the_content(); ?>
  </div>
</main>