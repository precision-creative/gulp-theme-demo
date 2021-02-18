<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<main id="page-404">
  <div class="<?php echo $container; ?>">
    <div class="row">
      <div class="col text__col">
        <h1 class="header__404">404</h1>
        <h3 class="header">The page you are looking for wasn't found.</h3>
        <div class="pcButton__wrapper pcButton__wrapper--center">
          <a href="/" class="pcButton">Return to Safety</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>