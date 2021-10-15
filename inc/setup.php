<?php

/**
 * Sets up theme support and adds menus
 */
function pc_setup()
{
  /**
   * Add various theme supports 
   * 
   * @see https://developer.wordpress.org/reference/functions/add_theme_support/
   */
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

  /**
   * Add menu locations for the theme
   */
  register_nav_menus(array(
    'desktop_menu' => 'Desktop',
    'mobile_menu' => 'Mobile',
    'footer_menu' => 'Footer',
  ));

  /**
   * Register custom image sizes for the blogs
   * 
   * @see https://developer.wordpress.org/reference/functions/add_image_size/
   */
  add_image_size('archives', 960, 640, true);
  add_image_size('container', 1100);
}
add_action('after_setup_theme', 'pc_setup');
