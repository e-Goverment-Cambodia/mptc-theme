<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;

$base = new BaseController;
$pid = get_the_ID();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php get_template_part( 'template-parts/components/post-tag' ); ?>
		<div class="block-title mb-1 mb-sm-2">
			<h2><?php the_title() ?></h2>
		</div>
		<?php get_template_part( 'template-parts/components/entry-meta' ); ?>
		<?php 
		$arg = [
			'pid' => $pid,
			'option' => 'post_option_multicheck',
			'key' => 'share'
		];
		if ( $base->getPostOption( $arg ) ) :
		?>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_inline_share_toolbox_vjl2 mb-2 mb-md-4"></div>
		<?php endif ?>
	</header>
	
	<?php get_template_part( 'template-parts/components/pdf-view' ); ?>
	
	<div class="entry-content mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php 
$arg = [
	'pid' => $pid,
	'option' => 'post_option_multicheck',
	'key' => 'related'
];
if ( $base->getPostOption( $arg ) ) :
	get_template_part( 'template-parts/components/related-post' );
endif;