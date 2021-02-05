<?php

/**
 * The template for displaying search forms
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
	<label class="sr-only" for="s">Search</label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="Search..." value="<?php the_search_query(); ?>">
		<input id="searchsubmit" name="submit" type="submit" />
	</div>
</form>