<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

$includes = array(
  // Setup the theme
  '/setup.php',

  // Enqueue proper scripts and styles
  '/enqueue.php',

  // Dequeue not needed scripts and styles
  '/dequeue.php',

  // Register hooks 
  '/hooks.php',

  // Load the general controls into the customizer
  '/class-pc-customizer.php',

  // Load the settings pages
  '/class-pc-settings.php',

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
