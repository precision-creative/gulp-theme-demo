<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and loads navbar and mobile menu
 *
 * @package PrecisionCreative
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$custom_logo_id = get_theme_mod('custom_logo');
$custom_logo_url = wp_get_attachment_image_src($custom_logo_id, 'full')[0];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="Description" content="<?php echo get_bloginfo('description'); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action('wp_body_open'); ?>

  <nav class="navbar navbar-expand-xl">
    <div class="navbar__container container">
      <!-- Site Logo -->
      <a class="navLogo__link" href="/">
        <img class="navLogo" src="<?php echo $custom_logo_url; ?>" alt="Test">
      </a>

      <!-- Start main menu -->
      <?php
      wp_nav_menu(
        array(
          'theme_location'  => 'desktop_menu',
          'container_id'    => 'navLinks__container',
          'container_class' => 'navLinks__container',
          'menu_id'         => 'navLinks__menu',
          'menu_class'      => 'navLinks__menu',
          'fallback_cb'     => 'fallback_menu',
          'depth'           => 1,
          'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
      )
      ?>
      <!-- End main menu -->

      <!-- Mobile Hamburger button -->
      <span class="pushy__hamburger">
        <svg class="pushy__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8V6H21V8H3ZM3 13H21V11H3V13ZM3 18H21V16H3V18Z" fill="black" fill-opacity="0.54" />
        </svg>
      </span>
      <!-- End Mobile Hamburger button -->
    </div>
  </nav>
  <!-- The Pushy -->
  <aside class="pushy pushy-right">
    <div class="pushy__header">
      <div class="pushyClose__wrapper">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="black" fill-opacity="0.54" />
        </svg>
      </div>
    </div>
    <?php
    wp_nav_menu(array(
      'theme_location'  => 'mobile_menu',
      'container_id'    => 'pushyLinks__container',
      'container_class' => 'pushyLinks__container',
      'menu_id'         => 'pushyLinks__menu',
      'menu_class'      => 'pushyLinks__menu',
      'fallback_cb'     => 'fallback_menu',
      'depth'           => 1,
      'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
    )) ?>
    <div class="pushy__footer">
      <a class="pushyFooter__link" href="#" aria-label="View our Facebook" target="_blank" rel="noreferrer">
        <svg class="pushyFooter__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path style="fill: currentColor;" fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 4.93913 2.42143 3.92172 3.17157 3.17157C3.92172 2.42143 4.93913 2 6 2H18C19.0609 2 20.0783 2.42143 20.8284 3.17157C21.5786 3.92172 22 4.93913 22 6V18C22 19.0609 21.5786 20.0783 20.8284 20.8284C20.0783 21.5786 19.0609 22 18 22H6C4.93913 22 3.92172 21.5786 3.17157 20.8284C2.42143 20.0783 2 19.0609 2 18V6ZM6 4C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H12V13H11C10.7348 13 10.4804 12.8946 10.2929 12.7071C10.1054 12.5196 10 12.2652 10 12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12V9.5C12 8.57174 12.3687 7.6815 13.0251 7.02513C13.6815 6.36875 14.5717 6 15.5 6H16.1C16.3652 6 16.6196 6.10536 16.8071 6.29289C16.9946 6.48043 17.1 6.73478 17.1 7C17.1 7.26522 16.9946 7.51957 16.8071 7.70711C16.6196 7.89464 16.3652 8 16.1 8H15.5C15.303 8 15.108 8.0388 14.926 8.11418C14.744 8.18956 14.5786 8.30005 14.4393 8.43934C14.3001 8.57863 14.1896 8.74399 14.1142 8.92597C14.0388 9.10796 14 9.30302 14 9.5V11H16.1C16.3652 11 16.6196 11.1054 16.8071 11.2929C16.9946 11.4804 17.1 11.7348 17.1 12C17.1 12.2652 16.9946 12.5196 16.8071 12.7071C16.6196 12.8946 16.3652 13 16.1 13H14V20H18C18.5304 20 19.0391 19.7893 19.4142 19.4142C19.7893 19.0391 20 18.5304 20 18V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4H6Z" fill="black" />
        </svg>
      </a>
      <a class="pushyFooter__link" href="#" aria-label="View our Instagram" target="_blank" rel="noreferrer">
        <svg class="pushyFooter__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path style="fill: currentColor;" fill-rule="evenodd" clip-rule="evenodd" d="M2 6.00043C2 4.93956 2.42143 3.92215 3.17157 3.172C3.92172 2.42185 4.93913 2.00043 6 2.00043H18C19.0609 2.00043 20.0783 2.42185 20.8284 3.172C21.5786 3.92215 22 4.93956 22 6.00043V18.0004C22 19.0613 21.5786 20.0787 20.8284 20.8289C20.0783 21.579 19.0609 22.0004 18 22.0004H6C4.93913 22.0004 3.92172 21.579 3.17157 20.8289C2.42143 20.0787 2 19.0613 2 18.0004V6.00043ZM6 4.00043C5.46957 4.00043 4.96086 4.21114 4.58579 4.58621C4.21071 4.96129 4 5.46999 4 6.00043V18.0004C4 18.5309 4.21071 19.0396 4.58579 19.4146C4.96086 19.7897 5.46957 20.0004 6 20.0004H18C18.5304 20.0004 19.0391 19.7897 19.4142 19.4146C19.7893 19.0396 20 18.5309 20 18.0004V6.00043C20 5.46999 19.7893 4.96129 19.4142 4.58621C19.0391 4.21114 18.5304 4.00043 18 4.00043H6ZM12 9.00043C11.2044 9.00043 10.4413 9.3165 9.87868 9.87911C9.31607 10.4417 9 11.2048 9 12.0004C9 12.7961 9.31607 13.5591 9.87868 14.1217C10.4413 14.6844 11.2044 15.0004 12 15.0004C12.7956 15.0004 13.5587 14.6844 14.1213 14.1217C14.6839 13.5591 15 12.7961 15 12.0004C15 11.2048 14.6839 10.4417 14.1213 9.87911C13.5587 9.3165 12.7956 9.00043 12 9.00043ZM7 12.0004C7 10.6743 7.52678 9.40258 8.46447 8.46489C9.40215 7.52721 10.6739 7.00043 12 7.00043C13.3261 7.00043 14.5979 7.52721 15.5355 8.46489C16.4732 9.40258 17 10.6743 17 12.0004C17 13.3265 16.4732 14.5983 15.5355 15.536C14.5979 16.4736 13.3261 17.0004 12 17.0004C10.6739 17.0004 9.40215 16.4736 8.46447 15.536C7.52678 14.5983 7 13.3265 7 12.0004ZM17.5 8.00043C17.8978 8.00043 18.2794 7.84239 18.5607 7.56109C18.842 7.27978 19 6.89825 19 6.50043C19 6.1026 18.842 5.72107 18.5607 5.43977C18.2794 5.15846 17.8978 5.00043 17.5 5.00043C17.1022 5.00043 16.7206 5.15846 16.4393 5.43977C16.158 5.72107 16 6.1026 16 6.50043C16 6.89825 16.158 7.27978 16.4393 7.56109C16.7206 7.84239 17.1022 8.00043 17.5 8.00043Z" fill="black" />
        </svg>
      </a>
      <a class="pushyFooter__link" href="/contact" aria-label="Contact us">
        <svg class="pushyFooter__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path style="fill: currentColor;" fill-rule="evenodd" clip-rule="evenodd" d="M12 4.00049C10.8037 4.00107 9.62273 4.26995 8.54408 4.78733C7.46543 5.30471 6.51655 6.05742 5.76729 6.99004C5.01803 7.92267 4.48747 9.01145 4.21468 10.1762C3.94188 11.341 3.93379 12.5522 4.19101 13.7205C4.44822 14.8889 4.96419 15.9846 5.70093 16.9272C6.43766 17.8697 7.37641 18.635 8.44805 19.1668C9.5197 19.6985 10.697 19.9832 11.8932 19.9997C13.0894 20.0163 14.274 19.7644 15.36 19.2625C15.6007 19.1508 15.8759 19.1394 16.125 19.2306C16.3741 19.3218 16.5768 19.5083 16.6885 19.749C16.8002 19.9897 16.8116 20.2649 16.7204 20.514C16.6292 20.7631 16.4427 20.9658 16.202 21.0775C14.8852 21.6874 13.4512 22.0024 12 22.0005C6.477 22.0005 2 17.5235 2 12.0005C2 6.47749 6.477 2.00049 12 2.00049C17.523 2.00049 22 6.47749 22 12.0005V12.0195C21.958 14.2095 21.26 15.6845 20.233 16.5995C19.229 17.4935 18.04 17.7375 17.21 17.7375C16.018 17.7375 14.971 17.1175 14.372 16.1835C12.296 18.0185 9.302 18.4225 7.454 16.3685C5.528 14.2285 6.065 10.6555 8.12 8.37249C10.108 6.16349 13.723 5.31049 15.798 7.86649C15.888 7.62464 16.068 7.42695 16.3004 7.31476C16.5328 7.20256 16.7996 7.18455 17.045 7.26449C17.2903 7.34443 17.4953 7.51612 17.617 7.74368C17.7387 7.97123 17.7677 8.23703 17.698 8.48549C17.106 10.5615 16.408 12.6185 15.885 14.7125C15.9613 15.0059 16.1328 15.2656 16.3726 15.4511C16.6124 15.6366 16.9069 15.7373 17.21 15.7375C17.69 15.7375 18.358 15.5915 18.903 15.1065C19.423 14.6435 19.965 13.7525 20 11.9915C19.9976 9.87132 19.1537 7.8388 17.6537 6.34045C16.1536 4.84211 14.1202 4.00049 12 4.00049ZM14.353 12.9145C14.423 12.6745 14.606 12.0335 14.82 11.2865C15.053 10.4665 14.75 9.68049 14.112 8.97049C13.192 7.94949 11.22 7.91749 9.607 9.71049C7.984 11.5125 7.925 13.9015 8.941 15.0305C9.86 16.0515 11.832 16.0835 13.446 14.2905C13.819 13.8765 14.17 13.4465 14.353 12.9145Z" fill="black" />
        </svg> </a>
    </div>
  </aside>
  <div class="pushy__overlay"></div>