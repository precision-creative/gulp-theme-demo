<?php

/**
 * Template Name: Parallax Demo Template
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package PrecisionCreative
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod('container_width');
?>

<main id="parallax-demo">
	<div class="<?php echo $container; ?>">
		<div class="row">
			<div class="col-12">
				<div class="tall">

				</div>
				<div class="tall">

				</div>
				<div class="parallax-window" data-parallax="scroll" data-image-src="https://via.placeholder.com/300x200?text=I Am The Parallax">

				</div>
				<div class="tall">

				</div>
				<div class="tall">

				</div>
			</div>
		</div>
	</div>
</main>

<script>
	// Notes 
	// We need to wait until the parallax scripts have been loaded in
	// 
	// See CSS Below for setting a row's height and make sure it's background is transparent
	//
	// Do not use an image that is too big, otherwise
	// you will end up with SCROLL JANKING 
	// http://jankfree.org/
	//
	// It seems to jank no matter what when logged into WordPress (text in an incognito tab)

	document.addEventListener("DOMContentLoaded", function() {
		jQuery(".parallax-window").parallax({
			// Options can be found here 
			// https://github.com/pixelcog/parallax.js#options
		});
	})
</script>

<style>
	.tall {
		height: 50vh;
		background-color: red;
	}

	.tall:nth-of-type(2) {
		background-color: orange;
	}

	.tall:nth-of-type(3) {
		background-color: yellow;
	}

	.tall:nth-of-type(4) {
		background-color: green;
	}

	.parallax-window {
		height: 300px;
		background-color: transparent;
	}
</style>

<?php get_footer(); ?>