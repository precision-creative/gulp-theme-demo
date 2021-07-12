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

?>

<?php get_header(); ?>

<div class="container">
	<?php

	if (have_posts()) :
		while (have_posts()) : the_post();
			get_template_part('template-parts/content', get_post_format());
		endwhile;

		pc_posts_naviation();
	else :
		get_template_part('template-parts/content', 'none');
	endif;

	?>
</div>

<?php get_footer(); ?>