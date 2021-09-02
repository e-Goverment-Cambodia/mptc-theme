<?php
/**
 * @package MPTC_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="border-bottom mb-2 mb-md-4">
		<figcaption class="figcaption">
			<?php get_template_part( 'template-parts/components/post-tag' ); ?>
			<h5 class="title mb-0 mb-1 mb-sm-1 mb-lg-2 text-break"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
			<p class="excerpt mb-0 mb-sm-1 mb-lg-2 text-break d-none d-md-block">
			<?php echo mb_strimwidth( get_the_excerpt(), 0, 250, '...') ?>
			</p>
		</figcaption>
		<?php get_template_part( 'template-parts/components/entry-meta' ); ?>
	</figure>
</article><!-- #post-<?php the_ID(); ?> -->

