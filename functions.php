<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

$includes = array(
  // Enqueue proper scripts and styles
  '/enqueue.php',

  // Register hooks 
  '/hooks.php',

  // Load the general controls into the customizer
  '/class-pc-customizer.php',

  // Load the social controls into the customizer
  '/class-pc-customizer-socials.php',

  // Load the company controls into the customizer
  '/class-pc-customizer-company.php',

  // Load custom WordPress nav walker
  '/class-wp-bootstrap-navwalker.php',

  // Load custom nav walker
  '/class-pc-navwalker.php',

  // Load WooCommerce scripts and hooks (disabled by default)
  // '/class-pc-woocommerce.php',

  // Load custom nav walker
  '/pc-posts-navigation.php',

  // Useful helper functions 
  '/pc-helper-functions.php',
);

foreach ($includes as $file) {
  $filepath = locate_template('/inc' . $file);

  if (!$filepath) {
    trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
  }

  require_once $filepath;
}

/*
* Let WordPress manage the document title.
* This theme does not use a hard-coded <title> tag in the document head,
* WordPress will provide it for us.
*/
add_theme_support('title-tag');

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1568, 9999);

/*
* Add menu locations for the theme
*/
register_nav_menus(
  array(
    'desktop_menu' => 'Desktop Menu',
    'mobile_menu' => 'Mobile Navigation',
    'footer_menu' => 'Footer Navigation',
  )
);

/**
 * Add support for core custom logo
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support(
  'custom-logo'
);

// Prints HTML with meta information for the current post-date/time and author.
if (!function_exists('posted_on')) {
  function posted_on()
  {
    echo '<p class="entry__date">' . date('M d, Y', get_the_date('c')) . '</p>';
  }
}
