<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$includes = array(
  '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
  '/class-pc-woocommerce.php',    // Load WooCommerce scripts and hooks.
  '/class-pc-navwalker.php',    // Load custom nav walker.
  '/pc-posts-navigation.php',    // Load custom nav walker.
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
  // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
  // wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );
  // wp_enqueue_style( $handle, $src, $deps, $ver, $media);

  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  // wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );
  // wp_enqueue_style( $handle, $src, $deps, $ver, $in_footer);

  // Precision Styles
  wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');

  // Conditional Enqueueing 
  // Good for site speed and keeping CSS organized
  if (is_404()) {
    wp_enqueue_style('not-found', get_stylesheet_directory_uri() . '/css/page-404.css');
  }

  if (is_home() && !is_front_page()) {
    wp_enqueue_style('blog', get_stylesheet_directory_uri() . '/css/page-blog.css');
  }

  if (is_single()) {
    wp_enqueue_style('single', get_stylesheet_directory_uri() . '/css/page-single.css');
  }



  // Animate On Scroll (AOS) enqueuing
  // Add page or post IDs to the array to enqueue AOS to them
  $aos_page_ids = array(30);

  if (in_array(get_the_ID(), $aos_page_ids)) {
    wp_enqueue_style('aos', get_stylesheet_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_script('aos', get_stylesheet_directory_uri() . '/assets/js/aos.js', array(), null, true);
  }

  // Pushy or Accordion
  if (get_theme_mod('mobile_menu_type') === 'pushy') {
    // wp_enqueue_script('jquery');
    // wp_enqueue_script('pushy-scripts', get_stylesheet_directory_uri() . '/js/pushy.min.js', array('jquery'), false, true);
  } else if (get_theme_mod('mobile_menu_type') === 'accordion') {
    wp_enqueue_script('menu-dropdown-scripts', get_stylesheet_directory_uri() . '/js/accordion.js', array(), false, true);
  }

  // Always enqueue Precision Scripts
  wp_enqueue_script('precision', get_stylesheet_directory_uri() . '/js/precisioncreative.js', array(), false, true);
}



/*
* Add social links into the customizer
* These can be retrieved with `get_theme_mod(slug);`
*/
add_action('customize_register', 'socials_customizer_settings');
function socials_customizer_settings($wp_customize)
{
  $wp_customize->add_section('social_links', array(
    'title'      => 'Social Links',
    'priority'   => 160,
    'description' => 'Allows you to add social links throughout the site.',
  ));

  $socials = array(
    'facebook' => 'Facebook',
    'instagram' => 'Instagram',
    'twitter' => 'Twitter',
  );

  foreach ($socials as $social => $social_display_name) {
    $social_slug = $social . '_url';

    $wp_customize->add_setting($social_slug, array(
      'transport'   => 'refresh',
    ));

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $social_slug,
        array(
          'label' => $social_display_name,
          'section' => 'social_links',
          'type' => 'text',
        )
      )
    );
  }
}

// Adds Precision options to the customizer
add_action('customize_register', 'precision_customizer_settings');
function precision_customizer_settings($wp_customize)
{
  $wp_customize->add_section('precision_options', array(
    'title'      => 'Precision Options',
    'priority'   => 150,
    'description' => 'Allows you to customize various site settings',
  ));

  // Container Width 
  $wp_customize->add_setting('container_width', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'container_width',
      array(
        'label'      => 'Container Width',
        'description' => 'Whether or not to contain content on pages that support it',
        'section'    => 'precision_options',
        'settings'   => 'container_width',
        'type'      => 'select',
        'choices' => array(
          'container' => 'Box Width',
          'container-fluid' => 'Full Width',
        ),
        'priority' => 10,
      )
    )
  );

  // Mobile Menu Type 
  $wp_customize->add_setting('mobile_menu_type', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'mobile_menu_type',
      array(
        'label'      => __('Mobile Menu Type', ''),
        'description' => 'Decide what kind of mobile menu a site should have.',
        'section'    => 'precision_options',
        'settings'   => 'mobile_menu_type',
        'type'      => 'select',
        'choices' => array(
          'accordion' => 'Accordion',
          'pushy' => 'Pushy',
        ),
        'priority' => 10,
      )
    )
  );

  // Desktop Nav Collapse
  $wp_customize->add_setting('desktop_nav_collapse', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'desktop_nav_collapse',
      array(
        'label'      => 'Desktop Navbar Collapse',
        'description' => 'Decide when the desktop navbar should switch to mobile.',
        'section'    => 'precision_options',
        'settings'   => 'desktop_nav_collapse',
        'type'      => 'select',
        'choices' => array(
          'xl' => 'Extra Large',
          'lg' => 'Large',
          'md' => 'Medium',
          'sm' => 'Small',
        ),
        'priority' => 10,
      )
    )
  );

  // Footer logo
  $wp_customize->add_setting('footer_logo', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'footer_logo',
      array(
        'label'      => 'Footer Logo',
        'description' => 'Applied in the footer in cases where the footer logo needs to be a different color or shade',
        'section'    => 'precision_options',
        'settings'   => 'footer_logo',
        'context'    => 'your_setting_context'
      )
    )
  );

  // Main Address
  $wp_customize->add_setting('address', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address', array(
    'label'        => 'Address',
    'description' => 'Address to be used throughout the site',
    'section'    => 'precision_options',
    'settings'   => 'address',
    'type'   => 'text'
  )));

  // Phone
  $wp_customize->add_setting('phone', array(
    'default'     => '',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'phone', array(
    'label'        => 'Phone',
    'description' => 'Phone number to be used throughout the site (digits only)',
    'section'    => 'precision_options',
    'settings'   => 'phone',
    'type'   => 'text',
  )));

  // Email
  $wp_customize->add_setting('email', array(
    'default'     => '',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email', array(
    'label'        => 'Email',
    'description' => 'Email address to be used throughout the site',
    'section'    => 'precision_options',
    'settings'   => 'email',
    'type'   => 'text',
  )));

  // Company Name
  $wp_customize->add_setting('company', array(
    'default'     => '',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'company', array(
    'label'        => 'Company Name',
    'description' => 'Company Name be used throughout the site',
    'section'    => 'precision_options',
    'settings'   => 'company',
    'type'   => 'text',
  )));
}

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
 * Adds function for parsing phone numbers
 */
function parse_phone_number($number)
{
  if (preg_match('/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches)) {
    $result = $matches[1] . ' . ' . $matches[2] . ' . ' . $matches[3];
    return $result;
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
