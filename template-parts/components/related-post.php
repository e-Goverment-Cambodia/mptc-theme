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
  <h2><?php echo __("Related Post") ?></h2>
</div>
<ul class="slick-slide-show p-0 row gx-3" data-slick='{ "autoplay": true, "slidesToShow": 3, "slidesToScroll": 3, "dots": true, "responsive": [ { "breakpoint": 992, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }, { "breakpoint": 768, "settings": { "slidesToShow": 2, "slidesToScroll": 2 } }, { "breakpoint": 576, "settings": { "slidesToShow": 1,  "slidesToScroll": 1 } } ] }'>
    <?php foreach( $related as $post ) : ?>
        <?php setup_postdata($post) ?>
            <li class="px-2">
                
                <figure class="p-0 m-0">
                    <div class="thumbnail mb-0 mb-1 mb-sm-1 mb-lg-2">
                      <a href="<?php the_permalink() ?>">
                        <div class="ratio ratio-16x9 ratio-sm-16x9 ratio-md-16x9 ratio-lg-16x9 bg-gray-100">
                          <div style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></div>
                        </div>
                      </a>
                    </div>
                    <figcaption class="figcaption">
                      <?php get_template_part( 'template-parts/components/post-tag' ); ?>  
                      <h5 class="title mb-0 mb-1 mb-sm-1 mb-lg-2"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                      <?php get_template_part( 'template-parts/components/entry-meta' ); ?>
                    </figcaption>
                </figure>
            </li>
    <?php endforeach; ?>
</ul>   
    <?php wp_reset_postdata() ?>
<?php endif;