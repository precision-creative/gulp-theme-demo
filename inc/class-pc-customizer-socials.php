<?php

class PC_Customizer_Socials {
  private $section_slug = 'social_links';
  private $section_title = 'Social Links';

  private $socials = array(
    array(
      'label' => 'Facebook',
      'handle' => 'facebook_url',
      'default' => 'https://facebook.com/'
    ),
    array(
      'label' => 'Instagram',
      'handle' => 'instagram_url',
      'default' => 'https://instagram.com/'
    ),
    array(
      'label' => 'Twitter',
      'handle' => 'twitter_url',
      'default' => 'https://twitter.com/'
    ),
  ); 

  /**
   * Construct function that adds the customize_register action
   */
  function __construct() {
    add_action('customize_register', array($this, 'add_socials_to_customizer'));
  }

  /**
   * Responsible for function calls to 
   * build the social media links in the customizer
   * 
   * @param object $wp_customize The customizer instance
   */
  public function add_socials_to_customizer($wp_customize) {
    $this->add_customizer_section($wp_customize);

    foreach ($this->socials as $social) {
      $this->add_social_control($wp_customize, $social);
    }
  }

  /**
   * Adds the socials section to the customizer
   * 
   * @param object $wp_customize The customizer instance
   * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
   */
  private function add_customizer_section($wp_customize) {
    $wp_customize->add_section($this->section_slug , array(
      'title'      => $this->section_title,
      'priority'   => 160,
      'description' => 'Allows you to add social links which can be used throughout the site',
    ));
  }

  /**
   * Adds the social controls to the section in the customizer
   * 
   * @param object $wp_customize The customizer instance
   * @param array $social The social link to add
   */
  private function add_social_control($wp_customize, $social) {
    // Add the social's setting to the customizer
    $wp_customize->add_setting($social['handle'], array(
      'transport'   => 'refresh',
      'default' => isset($social['default']) ? $social['default'] : ''
    ));

    // Add the social's control to the customizer
    $wp_customize->add_control(
      $social['handle'],
      array(
        'label' => $social['label'],
        'section' => $this->section_slug,
        'type' => 'url',
        'input_attrs' => array(
          'placeholder' => 'https://your-url-here.com/',
        ),
      )
    );
  }
}

new PC_Customizer_Socials();