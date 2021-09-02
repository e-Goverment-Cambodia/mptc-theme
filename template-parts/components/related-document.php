<?php
/**
 * @package MPTC_THEME
 */

?>

<?php
    global $post;
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID) ) );    
?>
<?php if( $related ) : ?>
  <div class="block-title mb-2 mb-sm-2 mb-md-3 mb-lg-4">
    <h2><?php echo __("Related Document") ?></h2>
  </div>
  <?php foreach( $related as $post ) : ?>
      <?php setup_postdata($post) ?>
          <?php get_template_part( 'template-parts/content', 'document' ); ?>
  <?php endforeach; ?>
  <?php wp_reset_postdata() ?>
<?php endif;