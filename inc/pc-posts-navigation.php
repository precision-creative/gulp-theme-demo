<?php

function pc_posts_naviation()
{
  $pagination = '<div>';
  $pagination .= next_posts_link('Older Posts');
  $pagination .= '</div><div>';
  $pagination .= previous_posts_link('Newer Posts');
  $pagination .= '</div>';

  echo $pagination;
}
