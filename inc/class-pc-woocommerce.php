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
    if (is_woocommerce() || is_account_page() || is_cart() || is_checkout()) {
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
    add_theme_support('wc-product-gallery-slider');
    // add_theme_support('wc-product-gallery-lightbox');
  }

  /**
   * Adds front-end hooks
   */
  public function init_frontend_hooks()
  {
    // Shop loop
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    add_action('woocommerce_shop_loop_item_title', array($this, 'display_product_title_link'), 10);

    // Add custom product image to products in shop loop
    add_action('woocommerce_before_shop_loop_item_title', array($this, 'display_product_image'), 9);
    // Remove original thumbnails from products in shop loop 
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');

    // Move the price before the title
    add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 9);
    // Remove original price action
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');

    // Remove the ratings from the products in the shop loop
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

    // Add archive header
    add_action('woo_shop_header_left', array($this, 'woocommerce_shop_loop_header'), 7);

    // Move archive descriptions
    remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description');
    remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description');
    add_action('woo_shop_header_left', 'woocommerce_taxonomy_archive_description');
    add_action('woo_shop_header_left', 'woocommerce_product_archive_description');

    // Move breadcrumb into custom woo-shop-header 
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    add_action('woo_shop_header_left', 'woocommerce_breadcrumb', 5);

    // Move result count and product ordering form
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    add_action('woo_shop_header_right', 'woocommerce_result_count', 15);
    add_action('woo_shop_header_right', 'woocommerce_catalog_ordering', 20);

    // Add breadcrumbs to single products
    add_action('woocommerce_single_product_summary', 'woocommerce_breadcrumb', 2);

    // Remove the "additional information" tab
    add_filter('woocommerce_product_tabs', array($this, 'remove_additional_information_tab'), 98);

    // Content wrappers
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
    add_action('woocommerce_before_main_content', array($this, 'display_content_wrapper'));
    add_action('woocommerce_after_main_content', array($this, 'display_content_wrapper_end'));

    // Disable the sidebar
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
  }

  /**
   * Display the content wrapper
   */
  public function display_content_wrapper()
  {
    echo '<main class="woo"><div class="container">';
  }

  /**
   * Echo the content wrapper closing
   */
  public function display_content_wrapper_end()
  {
    echo '</div></div>';
  }

  /**
   * Wrap the product title in a link and a div
   */
  public function display_product_title_link()
  {
    echo '<div class="loop-product__title ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">';
    echo '<a class="loop-product__title-link" href="' . esc_url(get_the_permalink()) . '">';
    echo  get_the_title();
    echo '</a></div>';
  }

  /**
   * Displays the product image with a loop
   */
  public function display_product_image()
  {
    echo '<a class="loop-product__thumbnail-link" href="' . get_the_permalink() . '">';
    woocommerce_template_loop_product_thumbnail();
    echo '</a>';
  }

  /**
   * Adds the shop header to the custom shop header component
   */
  function woocommerce_shop_loop_header()
  {
    echo '<h1 class="woo__title header-loud">' . woocommerce_page_title(false) . '</h1>';
  }

  /**
   * Removes the "Additional information" tab from the front-end of single products
   * 
   * @param Array $tabs - The WooCommerce current tabs
   */
  function remove_additional_information_tab($tabs)
  {
    unset($tabs['additional_information']);
    return $tabs;
  }
}

new PC_WooCommerce();
