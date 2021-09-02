<?php
/**
 * @package MPTC_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
