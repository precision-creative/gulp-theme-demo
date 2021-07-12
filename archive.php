<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PrecisionCreative
 */

get_header();
$container = get_theme_mod('container_width');
?>

<main id="archive">
	<div class="<?php echo esc_attr($container); ?>">

		<?php if (have_posts()) : ?>

			<!-- <header class="page-header">
				<?php
				// the_archive_title('<h1 class="page-title">', '</h1>');
				// the_archive_description('<div class="taxonomy-description">', '</div>');
				?>
			</header> -->

		<?php while (have_posts()) : the_post();
				get_template_part('template-parts/content', get_post_format());
			endwhile;
		else :
			get_template_part('template-parts/content', 'none');
		endif; ?>
	</div>
</main>

<?php get_footer(); ?>