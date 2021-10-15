<?php

/**
 * Class for creating our theme's shortcodes
 * 
 * @author Grayson Gantek <ggantek@precisioncreative.com>
 */
class PC_Shortcodes
{
  /**
   * Construct function runs when a new instance is initiated
   */
  function __construct()
  {
    $this->init();
  }

  /**
   * Adds the shortcodes to WordPress
   */
  private function init()
  {
    add_shortcode('social_icons', array($this, 'social_icons_markup'));
  }

  /**
   * Creates the markup for the social media icons shortcode
   * 
   * @return string The HTML for the icons
   */
  public function social_icons_markup()
  {
    $socials = array(
      array(
        'name' => 'Facebook',
        'link' => get_option('facebook', 'https://facebook.com/'),
        'svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 26c7.1797 0 13-5.8203 13-13S20.1797 0 13 0 0 5.8203 0 13s5.8203 13 13 13Zm2.5782-16.3394h-.9128c-.7158 0-.8542.3516-.8546.8653v1.2246h1.6155l-.2213 1.7773h-1.3938V18h-1.7808v-4.4727h-1.4525V11.75h1.4525v-1.4004C12.0304 8.8281 12.932 8 14.2483 8c.6309 0 1.1725.0488 1.3299.0703v1.5903Z" fill="currentColor"/></svg>',
      ),
      array(
        'name' => 'Instagram',
        'link' => get_option('instagram', 'https://instagram.com/'),
        'svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 26c7.1797 0 13-5.8203 13-13S20.1797 0 13 0 0 5.8203 0 13s5.8203 13 13 13ZM8 9.2007C8 8.538 8.538 8 9.2008 8c.6625 0 1.2004.538 1.2008 1.2007 0 .663-.5378 1.2124-1.2008 1.2124C8.538 10.4131 8 9.8638 8 9.2007ZM17.9976 18 18 14.332c0-1.7939-.3862-3.1762-2.4838-3.1762-1.0083 0-1.6849.5532-1.9611 1.0781h-.0292v-.9107h-1.9888v6.6763h2.0708v-3.3057c0-.8706.165-1.7124 1.2429-1.7124 1.0622 0 1.0779.9937 1.0779 1.7681V18h2.0689ZM8.165 11.3237h2.0733V18H8.165v-6.6763Z" fill="currentColor"/></svg>',
      ),
      array(
        'name' => 'Twitter',
        'link' => get_option('twitter', 'https://twitter.com/'),
        'svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 26c7.1797 0 13-5.8203 13-13S20.1797 0 13 0 0 5.8203 0 13s5.8203 13 13 13Zm5-16.1006c-.2788.4151-.6208.7754-1.0275 1.0645.1483 3.08-2.2096 6.0986-5.8275 6.0986-1.1609 0-2.2367-.3345-3.145-.9199.1613.0205.3225.0278.4904.0278a4.1209 4.1209 0 0 0 2.5421-.874c-.8958-.0195-1.65-.6167-1.9154-1.4287.1241.0278.2567.0351.3879.0351.1887 0 .3704-.0215.5375-.0674-.932-.1909-1.6425-1.0185-1.6425-2.0146v-.0225c.2737.1504.5967.2461.9263.2525-.5454-.3648-.9109-.9937-.9109-1.7036 0-.378.1041-.7295.2809-1.0362 1.0133 1.2442 2.5216 2.0611 4.2258 2.1446-.0338-.149-.0475-.3052-.0475-.4678 0-1.129.9137-2.0503 2.0487-2.0503.3521 0 .6866.0898.979.249a2.055 2.055 0 0 1 .5185.4c.4663-.0938.9038-.2603 1.3-.4967-.1524.4805-.477.8794-.9021 1.1333.4134-.0527.8092-.1606 1.1813-.3237Z" fill="currentColor"/></svg>',
      )
    );

    $string = '<div class="socials">';
    $string .= '<div class="socials__flex">';

    foreach ($socials as $social) {
      $string .= '<a href="' . $social['link'] . '" target="_blank" rel="noreferrer" title="Visit us on ' . $social['name'] . '">' . $social['svg'] . '</a>';
    }

    $string .= '</div>';
    $string .= '</div>';

    return $string;
  }
}

new PC_Shortcodes();
