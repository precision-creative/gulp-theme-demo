<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('container_width');
?>

<main id="page-404">
  <div class="<?php echo $container; ?>">
    <section>
      <h1>404</h1>
      <h3>The page you are looking for wasn't found.</h3>
      <p class="pcButton__wrapper pcButton__wrapper--center">
        <a href="/" class="pcButton">Return to Safety</a>
      </p>
    </section>
  </div>
</main>

<?php get_footer(); ?>