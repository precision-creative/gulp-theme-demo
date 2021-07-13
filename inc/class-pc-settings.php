<?php

/**
 * PC_Settings adds social links to the admin sidebar
 * 
 * @since 1.2.0
 */
class PC_Settings
{
  private $menu_title = 'Precision';
  private $menu_slug = 'precision-options';
  private $menu_section = 'pc-main-section';
  private $menu_priority = 99;

  private $social_title = 'Social Links';
  private $social_slug = 'social-links';
  private $social_section = 'pc-social-links-section';

  private $company_title = 'Company Information';
  private $company_slug = 'company-info';
  private $company_section = 'pc-company-info-section';

  private $socials = array(
    array(
      'label' => 'Facebook URL',
      'name' => 'facebook',
      'default' => 'https://facebook.com/'
    ),
    array(
      'label' => 'Instagram URL',
      'name' => 'instagram',
      'default' => 'https://instagram.com/'
    ),
    array(
      'label' => 'Twitter URL',
      'name' => 'twitter',
      'default' => 'https://twitter.com/'
    ),
  );

  /**
   * Hook in admin menu functions
   */
  public function init()
  {
    add_action('admin_menu', array($this, 'add_menu_and_children'));
    add_action('admin_init', array($this, 'populate_precision_settings_pages'));
  }

  /**
   * Adds the menu and submenus to the admin sidebar
   */
  public function add_menu_and_children()
  {
    add_menu_page($this->menu_title, $this->menu_title, 'manage_options', $this->menu_slug, array($this, 'create_precision_settings_page'), null, $this->menu_priority);
    add_submenu_page($this->menu_slug, $this->social_title, 'Socials', 'manage_options', $this->social_slug, array($this, 'create_social_links_settings_page'), 10);
    add_submenu_page($this->menu_slug, $this->company_title, 'Company', 'manage_options', $this->company_slug, array($this, 'create_company_info_settings_page'), 15);
  }

  /**
   * Creates the main settings page HTML 
   */
  public function create_precision_settings_page()
  {
?>
    <div class="wrap">
      <h1>Precision Creative - General Settings</h1>
      <p>Site-wide settings can be found here.</p>
      <form action="options.php" method="post">
        <?php
        settings_fields($this->menu_section);
        do_settings_sections($this->menu_slug);
        submit_button();
        ?>
      </form>
    </div>
  <?php
  }

  /**
   * Creates the social links settings page HTML 
   */
  public function create_social_links_settings_page()
  {
  ?>
    <div class="wrap">
      <h1>Precision Creative - Social Media Links</h1>
      <p>Set site-wide links for social media accounts.</p>
      <form action="options.php" method="post">
        <?php
        settings_fields($this->social_section);
        do_settings_sections($this->social_slug);
        submit_button();
        ?>
      </form>
    </div>
  <?php
  }

  /**
   * Creates the company info settings page HTML 
   */
  public function create_company_info_settings_page()
  {
  ?>
    <div class="wrap">
      <h1>Precision Creative - Company Information</h1>
      <p>Set site-wide information about the company.</p>
      <form action="options.php" method="post">
        <?php
        settings_fields($this->company_section);
        do_settings_sections($this->company_slug);
        submit_button();
        ?>
      </form>
    </div>
<?php
  }

  /**
   * Add the Company Name input field
   */
  public function display_company_name_field()
  {
    echo '<input type="text" name="company-name" id="company-name" value="' . get_option('company-name') . '"/>';
  }

  /**
   * Add the Company Address input field
   */
  public function display_company_address_field()
  {
    echo '<input type="text" name="company-address" id="company-address" value="' . get_option('company-address') . '"/>';
  }

  /**
   * Add the Company Phone input field
   */
  public function display_company_phone_field()
  {
    echo '<input type="tel" name="company-phone" id="company-phone" value="' . get_option('company-phone') . '" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"/>';
  }

  /**
   * Add the Company Email input field
   */
  public function display_company_email_field()
  {
    echo '<input type="text" name="company-email" id="company-email" value="' . get_option('company-email') . '"/>';
  }

  /**
   * Adds a social link input field
   * 
   * @param array $social The social link to add
   */
  public function add_social_field($social)
  {
    echo '<input type="url" name="' . $social['name'] . '" id="' . $social['name'] . '" value="' . get_option($social['name']) . '" />';
  }

  /**
   * Populate the main settings page with its input fields
   */
  public function populate_precision_settings_pages()
  {
    // Register the sections
    add_settings_section($this->menu_section, 'General Settings', null, $this->menu_slug);
    add_settings_section($this->social_section, 'Social Links', null, $this->social_slug);
    add_settings_section($this->company_section, 'Company Information', null, $this->company_slug);

    // Adds the social link fields
    foreach ($this->socials as $social) {
      add_settings_field($social['name'], $social['label'], array($this, 'add_social_field'), $this->social_slug, $this->social_section, $social);
      register_setting($this->social_section, $social['name']);
    }

    // Adds the company fields
    add_settings_field('company-name', 'Name', array($this, 'display_company_name_field'), $this->company_slug, $this->company_section, array());
    add_settings_field('company-address', 'Address', array($this, 'display_company_address_field'), $this->company_slug, $this->company_section, array());
    add_settings_field('company-phone', 'Phone', array($this, 'display_company_phone_field'), $this->company_slug, $this->company_section, array());
    add_settings_field('company-email', 'Email', array($this, 'display_company_email_field'), $this->company_slug, $this->company_section, array());

    register_setting($this->company_section, 'company-name');
    register_setting($this->company_section, 'company-address');
    register_setting($this->company_section, 'company-phone');
    register_setting($this->company_section, 'company-email');
  }
}

$socials = new PC_Settings();
$socials->init();
