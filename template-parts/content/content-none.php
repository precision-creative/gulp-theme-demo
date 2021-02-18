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

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">Nothing Found</h1>
	</header>

	<div class="page-content">
		<?php if (is_search()) : ?>
			<p>Sorry, but nothing matched your search. Please try again with diffent wording.</p>
		<?php
			get_search_form();
		else : ?>
			<p>It seems we can't find what you're looking for. Maybe try a search?</p>
		<?php
			get_search_form();
		endif; ?>
	</div>
</section>