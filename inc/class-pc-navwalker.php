<?php

class PC_Navwalker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;

    $has_children = !empty($item->classes) && is_array($item->classes) && in_array('menu-item-has-children', $item->classes);

    $output .= "<li class='" . implode(" ", $item->classes) . "'>";

    // If no permalink...
    if ($permalink && $permalink != '#') {
      $output .= '<a href="' . $permalink . '">';
    } else {
      $output .= '<a href="#">';
    }

    $output .= $title;

    if (!empty($item->classes) && is_array($item->classes) && in_array('menu-item-has-children', $item->classes)) {
      $output .= '<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">';
      $output .= '<path d="M1.41 0.294983L0 1.70498L6 7.70498L12 1.70498L10.59 0.294983L6 4.87498L1.41 0.294983Z" fill="currentColor"/>';
      $output .= '</svg>';
    }

    $output .= '</a>';
  }
}
