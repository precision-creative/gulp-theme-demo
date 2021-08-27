<?php

/**
 * The template for displaying search results pages.
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $wp_query;
$total_results = $wp_query->found_posts;
?>

<?php get_header(); ?>

<div class="search-results">
	<div class="search-results__container container-sm">
		<p class="search-results__count">Showing <?php echo $total_results; ?> results.</p>
		<?php if (have_posts()) : ?>
			<header class="page-header">
				<h1 class="page-title">
					Search Results for "<span><?php echo get_search_query(); ?></span>"
				</h1>
			</header>
			<div class="search-results__grid">
				<?php
				while (have_posts()) : the_post();
					get_template_part('template-parts/content', 'search');
				endwhile; ?>
			</div>
		<?php else :
			get_template_part('template-parts/content', 'none');
		endif;
		?>
	</div>
</div>

<?php get_footer(); ?>