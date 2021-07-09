<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Enqueue the scripts for the theme
 * 
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function precision_scripts()
{
  // Sitewide
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');
  wp_enqueue_script('precision', get_stylesheet_directory_uri() . '/js/main.js', array(), false, true);

  // Accordion Scripts (Conditional)
  if (get_theme_mod('mobile_menu_type') === 'accordion') {
    wp_enqueue_script('menu-dropdown-scripts', get_stylesheet_directory_uri() . '/js/accordion.js', array(), false, true);
  }

  // 404 Page (Conditional)
  if (is_404()) {
    wp_enqueue_style('not-found', get_stylesheet_directory_uri() . '/css/page-404.css');
  }

  // Blog page (Conditional)
  if (is_home() && !is_front_page()) {
    wp_enqueue_style('blog', get_stylesheet_directory_uri() . '/css/page-blog.css');
  }

  // Single page (Conditional)
  if (is_single()) {
    wp_enqueue_style('single', get_stylesheet_directory_uri() . '/css/page-single.css');
  }
}
add_action('wp_enqueue_scripts', 'precision_scripts');
