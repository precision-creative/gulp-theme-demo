<?php

/**
 * The template for displaying search forms
 *
 * @package PrecisionCreative
 */
?>

<form method="get" id="search-form" class="search-form" action="<?php echo home_url(); ?>" role="search">
	<div class="search-form__group">
		<label class="search-form__label" for="search">Search</label>
		<input class="search-form__input" id="search" name="s" type="text" placeholder="Search..." value="<?php the_search_query(); ?>">
		<button class="search-form__submit">Submit</button>
	</div>
</form>