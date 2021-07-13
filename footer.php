<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package PrecisionCreative
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$logo = get_theme_mod('footer_logo', get_theme_mod('custom_logo'));
?>

<footer class="footer">
  <div class="footer__container">
    <p class="footer__logo">
      <a href="<?php echo site_url(); ?>">
        <?php echo wp_get_attachment_image($logo, array(300, 300), false, array('loading' => false)); ?>
      </a>
    </p>
    <?php wp_nav_menu(
      array(
        'theme_location'  => 'footer_menu',
        'container_id'    => '',
        'container_class' => 'footer__menu',
        'menu_id'         => '',
        'menu_class'      => 'footer__links',
        'fallback_cb'     => 'fallback_menu',
        'depth'           => 1,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
      )
    )
    ?>
  </div>
  <div class="footer__copyright">
    <div class="footer__container">
      <div class="footer__copyright__flex">
        <p>&copy; <?php echo date("Y") . ' ' . get_option('company-name', 'Company Name'); ?></p>
        <p>All Rights Reserved</p>
        <p>Powered by <a href="https://precisioncreative.com/" target="_blank" rel="noreferrer">Precision Creative</a></p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>