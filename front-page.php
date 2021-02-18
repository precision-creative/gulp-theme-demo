<?php

/**
 * Template Name: Front Page
 *
 * Template for the front page.
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('container_width');
?>

<main id="home">
	<div class="<?php echo $container; ?>">
		<?php while (have_posts()) : the_post();

			get_template_part('template-parts/content/content', 'page');

		endwhile; // end of the loop. 
		?>
	</div>
</main>

<?php get_footer(); ?>