<?php

/**
 * The template for 404 pages (not found)
 * 
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header();
?>

<main class="not-found">
  <div class="container">
    <h1 class="not-found__h1">404</h1>
    <h2 class="not-found__h2 header-loud">The page you are looking for wasn't found.</h2>
    <p class="not-found__buttons">
      <a class="not-found__button button" href="<?php echo esc_url(get_home_url()); ?>">Back to home</a>
    </p>
  </div>
</main>

<?php
get_footer();
