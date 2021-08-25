<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Dequeue scripts
 * 
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_script/
 * @link https://developer.wordpress.org/reference/functions/wp_deregister_script/
 */
function pc_dequeue_scripts()
{
  $handles = array(
    'wp-embed'
  );

  foreach ($handles as $handle) {
    wp_dequeue_script($handle);
    wp_deregister_script($handle);
  }
}
add_action('wp_enqueue_scripts', 'pc_dequeue_scripts', 90);

/**
 * Dequeue styles
 * 
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_deregister_style/
 */
function pc_dequeue_styles()
{
  $handles = array(
    'wp-block-library'
  );

  foreach ($handles as $handle) {
    wp_dequeue_style($handle);
    wp_deregister_style($handle);
  }
}
add_action('wp_enqueue_scripts', 'pc_dequeue_styles', 90);
