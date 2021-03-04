<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package precisioncreative
 */

get_header();

if (have_posts()) : ?>
	<div class="container">
		<?php while (have_posts()) :
			the_post();
			get_template_part('template-parts/content/content');
		endwhile;
		pc_posts_naviation(); ?>
	</div>
<?php else :
	get_template_part('template-parts/content/content', 'none');
endif;
get_footer();
