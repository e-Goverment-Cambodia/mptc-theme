<?php
/**
 * @package MPTC_THEME
 */

?>

<?php
    global $post;
    $terms = get_terms( ['organization_type', 'sector'] );
    $term_id = [];
    foreach ( $terms as $key => $value ) {
        array_push( $term_id, $value->term_id );
    }

    $args = [
        'post_type' => get_post_type(),
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'organization_type',
                'field'    => 'term_id',
                'terms'    => $term_id
            ],
            [
                'taxonomy' =>  'sector',
                'field'    => 'term_id',
                'terms'    => $term_id
            ],
        ],
    ];
    $query = new \WP_Query( $args );
    $exclude = $post->ID;
?>
<?php if( $query->have_posts() ) : ?>
  <div class="block-title mb-2 mb-sm-2 mb-md-3 mb-lg-4">
    <h2><?php echo __("Related Organization") ?></h2>
  </div>
  <?php while ( $query->have_posts() ) : ?>
      <?php 
        $query->the_post();
        if ( get_the_ID() !== $exclude ) {
          get_template_part( 'template-parts/content', 'organization' );
        }
      ?>
  <?php endwhile; ?>
<?php endif;