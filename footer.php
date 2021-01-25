<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php
$footer_logo = get_theme_mod('footer_logo');
$address = get_theme_mod('address');
$phone = get_theme_mod('phone');
$email = get_theme_mod('email');
$company = get_theme_mod('company');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="footer">
  <div class="footer__content container">
    <div class="row footer__row">
      <div class="col footer__col">
        <a class="footerLogo__link" href="<?php echo site_url(); ?>">
          <img class="footerLogo" src="<?php echo $footer_logo; ?>" alt="<?php echo $company . ' Logo'; ?>">
        </a>
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'footer_menu',
            'container_id'    => 'footerLinks__container',
            'container_class' => 'footerLinks__container',
            'menu_id'         => 'footerLinks__menu',
            'menu_class'      => 'footerLinks__menu',
            'fallback_cb'     => 'fallback_menu',
            'depth'           => 1,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
          )
        )
        ?>
      </div>
    </div>
  </div>
</footer>
<div class="container-fluid copyright__container">
  <div class="row copyright__row">
    <div class="col copyright__col">
      <p class="copyright__p copyright__p--copyright">&copy; <?php echo date("Y") . ' ' . $company; ?></p>
      <p class="copyright__p">All Rights Reserved</p>
      <p class="copyright__p copyright__p--precision">Powered By <a href="https://precisioncreative.com/" target="_blank" rel="noreferrer">Precision Creative</a></p>
    </div>
  </div>
</div>

<?php wp_footer(); ?>