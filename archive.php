<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;

get_header();
?>

<main class="container">
	<header class="mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<div class="block-title mb-1 mb-sm-2">
			<h2>
				<?php 
					$title = new BaseController;
					echo $title->title();
				?>
			 </h2>
		</div>
	</header>

	<?php
	if ( have_posts() ) :

		$category_template = get_term_meta( get_queried_object_id(), 'cmb_category_template', true );


		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			switch ( $category_template ) {
				case 'document':
					get_template_part( 'template-parts/content', 'document' );
					break;
				
				default:
					get_template_part( 'template-parts/content', get_post_type() );
					break;
			}
			
		endwhile;

		get_template_part( 'template-parts/components/pagination-link' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
get_footer();
