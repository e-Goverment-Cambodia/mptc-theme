<?php
/**
 * @package MPTC_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php get_template_part( 'template-parts/components/post-tag' ); ?>
		<div class="block-title mb-1 mb-sm-2">
			<h2><?php the_title() ?></h2>
		</div>
		<?php get_template_part( 'template-parts/components/entry-meta' ); ?>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_inline_share_toolbox_vjl2 mb-2 mb-md-4"></div>
	</header>
	
	<?php get_template_part( 'template-parts/components/pdf-view' ); ?>
	
	<div class="entry-content mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_template_part( 'template-parts/components/related-document' );