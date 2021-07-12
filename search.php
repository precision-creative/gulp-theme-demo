<?php

/**
 * The template for displaying search results pages.
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('container_width');
?>

<main id="search">
	<div class="<?php echo $container; ?>">
		<?php if (have_posts()) { ?>
			<header class="page-header">
				<h1 class="page-title">
					Search Results for: <span><?php echo get_search_query(); ?></span>
				</h1>
			</header>
		<?php
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/content', 'search');
			}
		} else {
			get_template_part('template-parts/content', 'none');
		} ?>
	</div>
</main>

<?php get_footer(); ?>