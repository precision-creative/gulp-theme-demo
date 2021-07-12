<?php

/**
 * Template part for displaying WooCommerce pages from conditional in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PrecisionCreative
 */

?>

<div class="woo">
  <div class="woo__container">
    <header class="woo__header">
      <h1 class="woo__h1"><?php echo get_the_title(); ?></h1>
    </header>
    <?php the_content(); ?>
  </div>
</div>