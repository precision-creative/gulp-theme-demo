<?php

/**
 * PC_WooCommerce sets WooCommerce up for
 * our usual requirements
 * 
 * @author Grayson Gantek <ggantek@precisioncreative.com>
 */
class PC_WooCommerce
{
  /**
   * Construct function runs when a new instance is initiated
   */
  function __construct()
  {
    if ($this->is_woocommerce_activated()) {
      $this->init_functions();
      $this->init_hooks();
    }
  }

  /**
   * Run the functions on init
   */
  private function init_functions()
  {
    $this->add_woo_theme_support();
    $this->remove_woo_styles();
    $this->init_frontend_hooks();
  }

  /**
   * Initialize the hooks
   */
  private function init_hooks()
  {
    // Adds theme support
    add_action('after_setup_theme', array($this, 'add_woo_theme_support'));

    // Load conditional styles
    add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
  }

  /**
   * Checks if WooCommerce is loaded
   *
   * @return boolean
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
   * Enqueue per-page styles
   */
  public function enqueue_styles()
  {
    if (is_woocommerce() || is_account_page() || is_cart()) {
      wp_enqueue_style('pc-woocommerce', get_stylesheet_directory_uri() . '/css/woocommerce-base.css');
    }

    if (is_shop() || is_product_tag() || is_product_category()) {
      wp_enqueue_style('shop', get_stylesheet_directory_uri() . '/css/woocommerce-shop.css');
    }

    if (is_product()) {
      wp_enqueue_style('product', get_stylesheet_directory_uri() . '/css/woocommerce-single.css');
    }

    if (is_cart()) {
      wp_enqueue_style('cart', get_stylesheet_directory_uri() . '/css/woocommerce-cart.css');
    }

    if (is_account_page()) {
      wp_enqueue_style('account', get_stylesheet_directory_uri() . '/css/woocommerce-account.css');
    }

    if (is_checkout()) {
      wp_enqueue_style('checkout', get_stylesheet_directory_uri() . '/css/woocommerce-checkout.css');
    }
  }

  /**
   * Removes default WooCommerce styling
   * 
   * This helps with site speed and gives us more
   * control over the look and feel of WooCommerce per website
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

  /**
   * Adds front-end hooks
   */
  public function init_frontend_hooks()
  {
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

    add_action('woocommerce_shop_loop_item_title', array($this, 'display_product_title_link'), 10);
    add_action('woocommerce_before_shop_loop_item_title', array($this, 'display_product_image_link_open'), 9);
    add_action('woocommerce_before_shop_loop_item_title', array($this, 'display_product_image_link_close'), 11);
    add_action('woocommerce_single_product_summary', 'woocommerce_breadcrumb', 4);
  }

  /**
   * Wrap the product title in a link and a div
   */
  public function display_product_title_link()
  {
    echo '<div class="product__title ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">';
    echo '<a class="product__title-link" href="' . get_the_permalink() . '">';
    echo  get_the_title();
    echo '</a></div>';
  }

  /**
   * Adds an opening link tag before the product thumbnail in loops
   */
  public function display_product_image_link_open()
  {
    echo '<a class="product__thumbnail-link" href="' . get_the_permalink() . '">';
  }

  /**
   * Adds an closing link tag before the product thumbnail in loops
   */
  public function display_product_image_link_close()
  {
    echo '</a>';
  }
}

new PC_WooCommerce();
