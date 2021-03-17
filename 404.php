<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('container_width');
?>

<main class="not-found">
  <div class="not-found__container">
    <section class="not-found__section">
      <h1>404</h1>
      <h3>The page you are looking for wasn't found.</h3>
      <p>
        <a href="/">Homepage</a>
      </p>
    </section>
  </div>
</main>

<?php get_footer(); ?>