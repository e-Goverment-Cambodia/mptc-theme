<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;

$instant = new BaseController;
$terms = $instant->getTermList( get_the_ID(), ['organization_type', 'sector'], '<ul class="taxonomies-list list-inline p-0 mb-0 mb-sm-1 mb-lg-2"><li class="list-inline-item">', '</li><li class="list-inline-item">', '</li></ul>' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="border-bottom mb-2 pb-2 mb-md-3 pb-md-3">
		<figcaption class="figcaption">
			<?php echo $terms; ?>
			<h5 class="title mb-0 text-break"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
		</figcaption>
	</figure>
</article><!-- #post-<?php the_ID(); ?> -->
