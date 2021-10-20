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

$logo = get_theme_mod('footer_logo');
if (!$logo) $logo = get_theme_mod('custom_logo');

?>

<footer class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__company">
        <a href="<?php echo site_url(); ?>" class="footer__home-link">
          <?php echo wp_get_attachment_image($logo, array(200, 41), false, array('loading' => false, 'class' => 'footer__logo')); ?>
        </a>
        <?php echo do_shortcode('[social_icons]'); ?>
      </div>
      <?php wp_nav_menu(array(
        'theme_location'  => 'footer_menu',
        'container_id'    => '',
        'container_class' => 'footer__menu',
        'menu_id'         => '',
        'menu_class'      => 'footer__links',
        'fallback_cb'     => 'fallback_menu',
        'depth'           => 1,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
      )); ?>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="copyright__flex">
        <p translate="no">&copy; <?php echo date("Y") . ' ' . get_option('company-name', 'Company Name'); ?></p>
        <p>Powered by <a href="https://precisioncreative.com/" target="_blank" rel="noreferrer" translate="no">Precision Creative</a></p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>