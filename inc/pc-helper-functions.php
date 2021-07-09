<?php

/**
 * Slugify any text
 * 
 * @param string $text The text to transform
 * @param string $divider [-] The separator for the text
 * @return string The transformed text
 * @link https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
 */
function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  // if nothing remains
  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

/**
 * Parse a string into a pretty phone number
 * 
 * @param string $number The number to parse
 */
function pretty_phone_number($number)
{
  if (preg_match('/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches)) {
    $result = '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
    return $result;
  } else {
    return $number;
  }
}

/**
 * Parse a link field from Advanced Custom Fields
 * 
 * @param array $link The ACF link field 
 * @return array The parsed and sanitized link with defaults for target
 */
function parse_acf_link($link)
{
  if (!isset($link['title']) || !isset($link['url'])) {
    return false;
  }

  return array(
    'title' => esc_html($link['title']),
    'target' => $link['target'] ? $link['target'] : '_self',
    'url' => esc_url($link['url'])
  );
}

/**
 * Prints HTML with meta information for the current post-date/time
 */
function posted_on()
{
  echo '<p class="entry__date">' . date('M d, Y', get_the_date('c')) . '</p>';
}
