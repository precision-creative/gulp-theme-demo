<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and loads navbar and mobile menu
 *
 * @package PrecisionCreative
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$mobile_menu_type = get_theme_mod('mobile_menu_type', 'pushy');
$nav_breakpoint = 'navbar-expand-' . get_theme_mod('desktop_nav_collapse', 'xl');

$facebook_url = get_option('facebook');
$instagram_url = get_option('instagram');
$email = get_option('company-email');

if ($mobile_menu_type === 'pushy') {
  $hamburger_class = 'hamburger__button hamburger--pushy';
} else if ($mobile_menu_type === 'accordion') {
  $hamburger_class = 'accordion__hamburger';
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <script>
    document.documentElement.classList.remove('no-js');
    document.documentElement.classList.add('js');
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action('wp_body_open'); ?>

  <?php if ($mobile_menu_type === 'pushy') : ?>
    <!-- The Pushy -->
    <aside id="pushy" class="pushy pushy-right" tabindex="-1">
      <!-- Pushy Header -->
      <div class="pushy__header">
        <button class="pushy__close">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor" />
          </svg>
        </button>
      </div>

      <!-- Pushy Menu -->
      <?php
      wp_nav_menu(array(
        'theme_location'  => 'mobile_menu',
        'container_id'    => 'pushy-menu-container',
        'container_class' => 'pushy__menu',
        'menu_id'         => '',
        'menu_class'      => 'pushy__links',
        'fallback_cb'     => 'fallback_menu',
        'depth'           => 2,
        'walker'          => new PC_Navwalker(),
      )) ?>

      <!-- Pushy Footer -->
      <div class="pushy__footer">
        <?php echo do_shortcode('[social_icons]'); ?>
      </div>
    </aside>
  <?php endif; ?>

  <?php do_action('pc_site_wrapper_open'); ?>

  <nav class="navbar <?php echo $nav_breakpoint; ?>">
    <div class="container">
      <div class="navbar__flex">
        <!-- Site Logo -->
        <div class="navbar__brand">
          <a href="<?php echo site_url(); ?>" class="navbar__home-link">
            <?php echo wp_get_attachment_image(get_theme_mod('custom_logo'), array(200, 41), false, array('loading' => false, 'class' => 'navbar__logo')); ?>
          </a>
        </div>

        <!-- Start main menu -->
        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'desktop_menu',
            'container_id'    => 'navbar-menu-container',
            'container_class' => 'navbar__menu',
            'menu_id'         => '',
            'menu_class'      => 'navbar__links no-js',
            'fallback_cb'     => 'fallback_menu',
            'depth'           => 2,
            'walker'          => new PC_Navwalker(),
          )
        )
        ?>
        <!-- End main menu -->

        <!-- Mobile Hamburger button used for Pushy or Accordion -->
        <div class="hamburger">
          <button id="hamburger" aria-label="Toggle Mobile Menu" class="<?php echo $hamburger_class; ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8V6H21V8H3ZM3 13H21V11H3V13ZM3 18H21V16H3V18Z" fill="currentColor" />
            </svg>
          </button>
        </div>
        <!-- End Mobile Hamburger button -->
      </div>
    </div>

    <?php if ($mobile_menu_type === 'accordion') : ?>
      <!-- Accordion -->
      <div id="accordion" class="accordion">
        <div class="container">
          <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'mobile_menu',
              'container_id'    => 'navbar-accordion-container',
              'container_class' => 'accordion__menu',
              'menu_id'         => '',
              'menu_class'      => 'accordion__links',
              'fallback_cb'     => 'fallback_menu',
              'depth'           => 1,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
          )
          ?>
        </div>
      </div>
    <?php endif; ?>
  </nav>