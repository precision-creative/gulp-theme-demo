<?php

/**
 * WooCommerce Modifications
 * 
 * @package Precision
 */

if (!class_exists('PC_WooCommerce')) {
  class PC_WooCommerce
  {
    /**
     * Construct function
     */
    public function __construct()
    {
      if ($this->is_woocommerce_activated()) {
        $this->init_functions();
        $this->init_hooks();
      }
    }

    /**
     * 
     * Initialize this class' functions
     *
     */
    private function init_functions()
    {
      $this->add_woo_theme_support();
      $this->remove_woo_styles();
      $this->enqueue_styles();
    }

    /**
     * 
     * Initialize the hooks
     *
     */
    private function init_hooks()
    {
      // Adds theme support
      add_action('after_setup_theme', array($this, 'add_woo_theme_support'));
    }

    /**
     * 
     * Checks if WooCommerce is loaded
     *
     * @return boolean
     * 
     */
    public function is_woocommerce_activated()
    {
      if (class_exists('woocommerce')) {
        return true;
      } else {
        return false;
      }
    }

    /**
     * 
     * Enqueue per-page styles
     * 
     */
    public function enqueue_styles()
    {
      if (is_cart()) {
        wp_enqueue_style('cart', get_stylesheet_directory_uri() . '/css/page-cart.css');
      }

      if (is_account_page()) {
        wp_enqueue_style('account', get_stylesheet_directory_uri() . '/css/page-account.css');
      }
    }

    /**
     * Removes default WooCommerce styling
     * 
     * This helps with sitespeed and gives us more control over the look and feel of WooCommerce per website
     * 
     */
    public function remove_woo_styles()
    {
      add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    }

    /**
     * Adds theme support for WooCommerce
     * 
     * @link overview https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
     * @link options https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-7
     */
    public function add_woo_theme_support()
    {
      add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 600,
        'single_image_width' => 1200,

        'product_grid' => array(
          'default_rows' => 3,
          'min_rows' => 2,
          'max_rows' => 8,
          'default_columns' => 4,
          'min_columns' => 2,
          'max_columns' => 5,
        ),
      ));

      add_theme_support('wc-product-gallery-zoom');
      add_theme_support('wc-product-gallery-lightbox');
      add_theme_support('wc-product-gallery-slider');
    }
  }
}

new PC_WooCommerce();
