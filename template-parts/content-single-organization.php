<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;

$instant = new BaseController;
$terms = $instant->getTermList( get_the_ID(), ['organization_type', 'sector'], '<ul class="taxonomies-list list-inline p-0 mb-0 mb-sm-1 mb-lg-2"><li class="list-inline-item">', '</li><li class="list-inline-item">', '</li></ul>' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="mb-1 mb-sm-2 mb-md-3 mb-lg-4">
		<?php echo $terms; ?>
		<div class="block-title mb-1 mb-sm-2 mb-md-3 mb-lg-4 mt-3">
			<h2><?php the_title() ?></h2>
		</div>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_inline_share_toolbox_vjl2 mb-2 mb-md-4"></div>
	</header>
	
	<div class="entry-content mb-1 mb-sm-2 mb-md-3 mb-lg-4">
	
	<div class="">

		<?php if ( get_post_meta( get_the_id(), 'cam_portal_dept_address', true ) ) : ?>
		<ul class="list-unstyled">
		<li class="">
			<?php echo __( 'Address : ' ) ?>
			<?php echo get_post_meta ( get_the_id(), 'cam_portal_dept_address', true ) ?>
			
		</li>
		</ul>
		<?php endif ?>

		<?php if ( get_post_meta ( get_the_id(), 'cam_portal_dept_address_maps', true ) ) : ?>
		<div class="embed-responsive embed-responsive-16by9 mb-3 mb-md-6">
		<iframe
			width="100%"
			height="450"
			frameborder="0" style="border:0"
			src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBbTDKtoivLuALOMTXcUViLnQZxNCuHdeA&q=<?php echo get_post_meta ( get_the_id(), 'cam_portal_dept_address_maps', true ) ?>" 
			allowfullscreen>
		</iframe>
		</div>
		<?php endif ?>
		<?php if ( is_array( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) ) && count ( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) ) ) : ?>
		<ul class="list-unstyled mb-0">
		<li class="item-wrap">
			<span class="item-title primary-color mb-3 d-block"><?php echo __( 'Contact : ') ?></span>
			<ul class="list-unstyled">
				<?php foreach ( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) as $item ) : ?>
					<?php if ( array_key_exists('contact_name', $item) ) : ?>
						<li>
							<strong><?php echo $item['contact_name'] ?></strong>
							<ul>
								<?php if ( array_key_exists('contact_position', $item) ) : ?>
									<li>
										<?php echo $item['contact_position'] ?></td>
									</li>
								<?php endif ?>
								<?php if ( array_key_exists('contact_number', $item) ) : ?>
									<li>
										<?php echo $item['contact_number'] ?></td>
									</li>
								<?php endif ?>
								<?php if ( array_key_exists('contact_email', $item) ) : ?>
									<li>
										<?php echo $item['contact_email'] ?></td>
									</li>
								<?php endif ?>
							</ul>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</li>
		</ul>
		<?php endif ?>
		</div>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_template_part( 'template-parts/components/related-organization' );