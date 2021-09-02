<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MPTC_THEME
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-bs-spy="scroll" data-bs-target="#menu-tab" data-bs-offset="10">
<?php wp_body_open(); ?>
<?php dynamic_sidebar( 'header' ); ?>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <form action="/" method="GET">
          <div class="input-group mb-0">
            <input value="<?php echo get_search_query() ?>" name="s" type="search" class="form-control" placeholder="<?php echo __( 'Key Word' ) ?>" aria-label="<?php echo __( 'SEARCH' ) ?>" aria-describedby="button-search">
            <button class="btn btn-outline bg-gradient color-white" type="submit" id="button-search"><?php echo __( 'SEARCH' ) ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    $primary = get_theme_mod( 'theme_color_setting' ) ?: '#0956AE';
    $secondary = get_theme_mod( 'theme_color_secondary_setting' ) ?: '#0956AE';
    $font = get_theme_mod( 'khmer_font_setting' ) ?: 'Koh-Santepheap';
?>

<style>
    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-primary: <?php echo $primary ?>;
        --bs-secondary: <?php echo $secondary ?>;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-font-sans-serif: "Open Sans", Helvetica, "<?php echo $font ?>", sans-serif;
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(45deg, <?php echo $primary ?>a1, <?php echo $primary ?>);
    }
</style>