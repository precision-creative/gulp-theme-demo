<?php

/**
 * PC_Customizer creates a section in the customizer
 * with settings and controls
 * 
 * @author Grayson Gantek <ggantek@precisioncreative.com>
 */
class PC_Customizer
{
  private $section_slug = 'precision_options';
  private $section_title = 'Precision Options';

  /**
   * Construct function runs when a new instance is initiated
   */
  function __construct()
  {
    add_action('customize_register', array($this, 'init'));
  }

  /**
   * Build the settings and controls in the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  public function init($wp_customize)
  {
    $this->add_customizer_section($wp_customize);
    $this->add_container_setting($wp_customize);
    $this->add_mobile_menu_setting($wp_customize);
    $this->add_desktop_breakpoint_setting($wp_customize);
    $this->add_footer_logo_setting($wp_customize);
  }

  /**
   * Adds a section to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_customizer_section($wp_customize)
  {
    $wp_customize->add_section($this->section_slug, array(
      'title' => $this->section_title,
      'priority' => 150,
      'description' => 'Allows you to customize various site settings.',
    ));
  }

  /**
   * Adds container setting and control to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_container_setting($wp_customize)
  {
    $slug = 'container_width';

    // Add the setting
    $wp_customize->add_setting($slug, array(
      'default' => 'container',
    ));

    // Add the control
    $wp_customize->add_control(
      $slug,
      array(
        'label' => 'Container Width',
        'description' => 'Whether or not to contain content on pages that support it.',
        'section' => $this->section_slug,
        'type' => 'select',
        'choices' => array(
          'container' => 'Box Width',
          'container-fluid' => 'Full Width',
        ),
      )
    );
  }

  /**
   * Adds mobile menu setting and control to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_mobile_menu_setting($wp_customize)
  {
    $slug = 'mobile_menu_type';

    // Add the setting
    $wp_customize->add_setting($slug, array(
      'default' => 'pushy',
    ));

    // Add the control
    $wp_customize->add_control(
      $slug,
      array(
        'label' => 'Mobile Menu Type',
        'description' => 'Decide what kind of mobile menu a site should have.',
        'section' => $this->section_slug,
        'type' => 'select',
        'choices' => array(
          'pushy' => 'Pushy',
          'accordion' => 'Accordion',
        ),
      )
    );
  }

  /**
   * Adds desktop nav collapse setting and control to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_desktop_breakpoint_setting($wp_customize)
  {
    $slug = 'desktop_nav_collapse';

    // Add the setting
    $wp_customize->add_setting($slug, array(
      'default'   => 'xl',
    ));

    // Add the control
    $wp_customize->add_control(
      $slug,
      array(
        'label'      => 'Desktop Navbar Collapse',
        'description' => 'Decide when the desktop navbar should switch to mobile.',
        'section'    => $this->section_slug,
        'type'      => 'select',
        'choices' => array(
          'xl' => 'Extra Large',
          'lg' => 'Large',
          'md' => 'Medium',
          'sm' => 'Small',
        ),
      )
    );
  }

  /**
   * Adds footer logo setting and control to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_footer_logo_setting($wp_customize)
  {
    $slug = 'footer_logo';

    // Add the setting
    $wp_customize->add_setting($slug);

    // Add the control
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        $slug,
        array(
          'label'      => 'Footer Logo',
          'description' => 'Applied in the footer in cases where the footer logo needs to be a different color or shade',
          'section'    => $this->section_slug,
        ),
      )
    );
  }
}

new PC_Customizer();
