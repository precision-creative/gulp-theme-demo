<?php

/**
 * Search results partial template.
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
		the_title('<h2 class="entry-title"><a href="' . get_permalink() . '">', '</a></h2>');

		if ('post' == get_post_type()) : ?>
			<div class="entry-meta">
				<?php posted_on(); ?>
			</div>
		<?php
		endif;
		?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>