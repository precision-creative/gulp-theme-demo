<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Enqueue the scripts and styles
 * 
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function pc_enqueues()
{
  // Sitewide
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/dist/css/main.css');
  wp_enqueue_script('precision', get_stylesheet_directory_uri() . '/dist/js/main.js', array(), false, true);

  // 404 Page (Conditional)
  if (is_404()) {
    wp_enqueue_style('not-found', get_stylesheet_directory_uri() . '/dist/css/page-404.css');
  }

  // Blog page (Conditional)
  if (is_home() && !is_front_page() || is_category() || is_tag()) {
    wp_enqueue_style('blog', get_stylesheet_directory_uri() . '/dist/css/page-blog.css');
  }

  // Single page (Conditional)
  if (is_single()) {
    wp_enqueue_style('single', get_stylesheet_directory_uri() . '/dist/css/page-single.css');
  }

  // Blocks page
  if ('page-templates/blocks.php' === get_page_template_slug()) {
    wp_enqueue_style('blocks', get_stylesheet_directory_uri() . '/dist/css/blocks.css');
  }

  // Search page
  if (is_page_template('page-templates/searchpage.php')) {
    wp_enqueue_style('page-search', get_stylesheet_directory_uri() . '/dist/css/page-search.css');
  }

  // Search results page 
  if (is_search()) {
    wp_enqueue_style('page-search-results', get_stylesheet_directory_uri() . '/dist/css/page-search-results.css');
  }
}
add_action('wp_enqueue_scripts', 'pc_enqueues');
