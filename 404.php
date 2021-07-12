<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main class="not-found">
  <div class="not-found__container">
    <section class="not-found__section">
      <h1 class="not-found__h2">404</h1>
      <h2 class="not-found__h1">The page you are looking for wasn't found.</h2>
      <p class="not-found__buttons">
        <a class="not-found__button" href="<?php echo esc_url(get_home_url()); ?>">Homepage</a>
      </p>
    </section>
  </div>
</main>

<?php get_footer(); ?>