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

<article <?php post_class('search-result'); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php echo get_permalink(); ?>" class="search-result__link">
		<header class="search-result__header">
			<?php the_title('<h2 class="search-result__title">', '</h2>'); ?>

			<?php if ('post' == get_post_type()) : ?>
				<div class="search-result__meta">
					<em><?php echo get_the_date('F d, Y'); ?></em>
				</div>
			<?php endif; ?>
		</header>

		<div class="search-result__excerpt">
			<?php the_excerpt(); ?>
		</div>
	</a>
</article>