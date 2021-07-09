<?php

/**
 * Change the excerpt length
 * 
 * @param int $length The default excerpt length
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
 * @param string $more The default excerpt string
 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
 */

function pc_excerpt_more()
{
  return '...';
}
add_filter('excerpt_more', 'pc_excerpt_more');

/**
 * Removes emoji scripts and styles
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
