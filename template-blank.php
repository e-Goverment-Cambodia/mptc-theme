<?php
/**
 * Template Name: Blank template
 * Template Post Type: page, post 
 *
 * @package MPTC_THEME
 */

get_header();
?>

<main>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'blank' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();