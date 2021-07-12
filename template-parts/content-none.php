<?php

/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<div class="content-none">
	<div <?php echo post_class(array('content-none__container', 'container')); ?>>
		<header class="content-none__header">
			<h1 class="content-none__h1">Nothing Found</h1>
		</header>
		<main class="content-none__body">
			<?php if (is_search()) : ?>
				<p>Sorry, but nothing matched your search. Please try again with diffent wording.</p>
				<?php get_search_form(); ?>
			<?php else : ?>
				<p>It seems we can't find what you're looking for. Maybe try a search?</p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</main>
	</div>
</div>