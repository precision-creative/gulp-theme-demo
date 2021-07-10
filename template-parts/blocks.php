<?php

// Check if page has flexible content blocks
if (have_rows('blocks')) :

  // Loop through the blocks
  while (have_rows('blocks')) : the_row();

    // Build the default class names
    $classes = array('block');

    // If a block has the additional_classes field,
    // add the extra classes to the list
    if (get_sub_field('additional_classes')) {
      array_push($classes, get_sub_field('additional_classes'));
    }

    // Example text block
    if ('text' === get_row_layout()) :
      array_push($classes, 'text');

      $text = get_sub_field('text');
?>
      <section class="<?php echo esc_attr(implode(' ', $classes)); ?>">
        <div class="text__container">
          <?php echo esc_html($text); ?>
        </div>
      </section>
<?php
    endif;
  endwhile;
endif;
