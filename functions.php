<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$includes = array(
  '/theme-settings.php',                  // Initialize theme default settings.
  '/setup.php',                           // Theme setup and custom theme supports.
  '/widgets.php',                         // Register widget area.
  // '/enqueue.php',                         // Enqueue scripts and styles.
  '/template-tags.php',                   // Custom template tags for this theme.
  '/pagination.php',                      // Custom pagination for this theme.
  '/hooks.php',                           // Custom hooks.
  '/extras.php',                          // Custom functions that act independently of the theme templates.
  '/customizer.php',                      // Customizer additions.
  '/custom-comments.php',                 // Custom Comments file.
  '/jetpack.php',                         // Load Jetpack compatibility file.
  '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
  // '/woocommerce.php',                     // Load WooCommerce functions.
  '/editor.php',                          // Load Editor functions.
);

foreach ($includes as $file) {
  $filepath = locate_template('/inc' . $file);
  if (!$filepath) {
    trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
  }
  require_once $filepath;
}

// Enqueue styles and scripts
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
  // Get the theme data

  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  // wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );

  // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
  // wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );

  // Bootstrap
  wp_enqueue_style('bootstrap-grid-styles', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css', array());
  wp_enqueue_script('bootstrap-scripts', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);

  // Fontawesome 
  // Should now be called with the official Fontawesome plugin, 
  // which prevents conflicts between plugins and therefore reduces pageload time

  // Pushy or Accordion
  if (get_theme_mod('mobile_menu_type') === 'pushy') {
    wp_enqueue_script('pushy-scripts', get_stylesheet_directory_uri() . '/js/pushy.min.js', array(), false, true);
  } else if (get_theme_mod('mobile_menu_type') === 'accordion') {
    wp_enqueue_script('menu-dropdown-scripts', get_stylesheet_directory_uri() . '/js/accordion.js', array(), false, true);
  }

  // Precision
  wp_enqueue_style('precision-styles', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_script('precision-scripts', get_stylesheet_directory_uri() . '/js/precisioncreative.js', array('jquery'), false, true);

  // Splide slider
  // Releases found here https://github.com/Splidejs/splide/releases

  // Fonts

  // Load comments script if comments are available
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('after_setup_theme', 'add_menu_locations');
function add_menu_locations()
{
  register_nav_menus(array(
    'desktop_menu' => __('Desktop Menu', 'Desktop links'),
    'mobile_menu' => __('Mobile Navigation', 'Mobile pushy links'),
    'footer_menu' => __('Footer Navigation', 'Footer links'),
  ));
}

function fallback_menu()
{
?>
  <ul class="navbar-nav ml-auto">
    <li><a href="#">Fallback menu</a></li>
    <li><a href="#">Fallback menu</a></li>
  </ul>
<?php
}

// add_action('widgets_init', 'widgets_init');
if (!function_exists('widgets_init')) {
  /**
   * Initializes themes widgets.
   */
  function widgets_init()
  {

    register_sidebar(array(
      'name' => __('Footer One', 'understrap'),
      'id' => 'footer-one',
      'description' => __('footer One widget area', 'understrap'),
      'before_widget' => '<div class="footer_common footer_one">',
      'after_widget' => '</ul></div>',
      'before_title' => '<h4 class="text-uppercase text-left">',
      'after_title' => '</h4><ul class="text-uppercase">',
    ));
  }
}

// Add social links options to the customizer
add_action('customize_register', 'socials_customizer_settings');
function socials_customizer_settings($wp_customize) {
  $wp_customize->add_section('social_links', array(
    'title'      => 'Social Links',
    'priority'   => 160,
    'description' => 'Allows you to add social links throughout the site.',
  ));

  // Facebook
  $wp_customize->add_setting('facebook_link', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'facebook_link',
      array(
        'label' => 'Facebook',
        'section' => 'social_links',
        'type' => 'text',
      )
    )
  );

  // Twitter
  $wp_customize->add_setting('twitter_link', array(
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'twitter_link',
      array(
        'label' => 'Twitter',
        'section' => 'social_links',
        'type' => 'text',
      )
    )
  );
  
  // Instagram
  $wp_customize->add_setting('instagram_link', array(
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'instagram_link',
      array(
        'label' => 'Instagram',
        'section' => 'social_links',
        'type' => 'text',
      )
    )
  );

  // Linkedin
  $wp_customize->add_setting('linkedin_link', array(
    'transport'   => 'refresh',
  ));
  
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'linkedin_link',
      array(
        'label' => 'Linkedin',
        'section' => 'social_links',
        'type' => 'text',
      )
    )
  );
}


// Adds Precision options to the customizer
add_action('customize_register', 'precision_customizer_settings');
function precision_customizer_settings($wp_customize)
{
  $wp_customize->add_section('precision_options', array(
    'title'      => 'Precision Options',
    'priority'   => 150,
    'description' => __('Allows you to customize various site settings', ''),
  ));

  // Container Width 
  $wp_customize->add_setting('container_width', array(
    'default'     => 'Box Width',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'container_width',
      array(
        'label'      => __('Container Width', ''),
        'description' => 'Whether the site is always full width or if it has a max width.',
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
    'default'     => 'pushy',
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
    'default'     => 'lg',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'desktop_nav_collapse',
      array(
        'label'      => __('Desktop Navbar Collapse', ''),
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
    'default'     => '',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'footer_logo',
      array(
        'label'      => __('Footer Logo', ''),
        'description' => 'Applied in the footer in cases where the footer logo needs to be a different color or shade',
        'section'    => 'precision_options',
        'settings'   => 'footer_logo',
        'context'    => 'your_setting_context'
      )
    )
  );

  // Main Address
  $wp_customize->add_setting('address', array(
    'default'     => '',
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
 * Prints HTML with meta information for the current post-date/time and author.
 */
if (!function_exists('posted_on')) {
  function posted_on()
  {
    echo '<p class="entry__date">' . date('M d, Y', get_the_date('c')) . '</p>';
  }
}
