<?php

/**
 * PC_Customizer_Company creates a section in the customizer for 
 * company information with settings and controls 
 * 
 * @author Grayson Gantek <ggantek@precisioncreative.com>
 */
class PC_Customizer_Company {
  private $section_slug = 'company';
  private $section_title = 'Company Information';

  // Modify these to add, change, or remove the controls
  private $controls = array(
    array(
      'label' => 'Company Name',
      'handle' => 'company_name',
      'desc' => 'Company Name be used throughout the site.',
    ),
    array(
      'label' => 'Address',
      'handle' => 'company_address',
      'desc' => 'Address to be used throughout the site.',
    ),
    array(
      'label' => 'Phone',
      'handle' => 'company_phone',
      'desc' => 'Phone number to be used throughout the site (digits only).',
    ),
    array(
      'label' => 'Email',
      'handle' => 'company_email',
      'desc' => 'Email address to be used throughout the site.',
    ),
  );

  /**
   * Construct function runs when a new instance is initiated
   */
  function __construct() {
    add_action('customize_register', array($this, 'init'));
  }  

  /**
   * Build the settings and controls in the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  public function init($wp_customize) {
    $this->add_customizer_section($wp_customize);

    foreach ($this->controls as $control) {
      $this->add_customizer_control($wp_customize, $control);
    }
  }

  /**
   * Adds a section to the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  private function add_customizer_section($wp_customize) {
    $wp_customize->add_section($this->section_slug, array(
      'title' => $this->section_title,
      'priority' => 160,
      'description' => 'Allows you to customize the company\'s information throughout the site.',
    ));
  }
  
  /**
   * Adds a control to the section
   * 
   * @param object $wp_customize The customizer instance
   * @param array $control The control to add
   */
  private function add_customizer_control($wp_customize, $control) {
    // Add the setting
    $wp_customize->add_setting($control['handle']);

    // Add the control
    $wp_customize->add_control(
      $control['handle'],
      array(
        'label' => $control['label'],
        'desc' => isset($control['desc']) ? $control['desc'] : '',
        'section' => $this->section_slug,
        'type' => 'text',
      )
    );
  }
}

new PC_Customizer_Company();