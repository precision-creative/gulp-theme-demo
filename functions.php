<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$includes = array(
  // Enqueue proper scripts and styles for the site
  '/enqueue.php',

  // Load the general controls into the customizer
  '/class-pc-customizer.php',

  // Load the social controls into the customizer
  '/class-pc-customizer-socials.php',

  // Load the company controls into the customizer
  '/class-pc-customizer-company.php',

  // Load custom WordPress nav walker.
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

/*
* Enqueue scripts and styles
*/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
  // Dequeue Block Library
  wp_dequeue_style('wp-block-library');
  wp_deregister_script('wp-embed');
}

// Removes the WP Emoji scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Add support for core custom logo.
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

/**
 * Filter the excerpt lenth to X words
 * 
 * @param int $length Excerpt length
 * 
 */
function pc_custom_excerpt_length($length)
{
  return 10;
}
add_filter('excerpt_length', 'pc_custom_excerpt_length', 999);


/**
 * Changes the default [...] post excerpt suffix
 * You could make this a read more link using get_the_permalink()
 * 
 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
 * 
 * @param string $more The default excerpt string
 */

function pc_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', 'pc_excerpt_more');
