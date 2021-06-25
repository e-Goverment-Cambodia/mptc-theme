<?php
/**
 * @package cam-portal-2
 */

namespace App\Egov;

class PostViewCount
{
    public function register() {
        add_action( 'wp_head', array( $this, 'callBackFunction') );
        // Defaul is post_view_count
        // Apply this filter for related plugin usable
        add_filter( 'egov_meta_value_num', function( $args ) { return 'post_views_count'; } );
    }

    public function callBackFunction() {
        global $post;
        if ( is_singular() ) {
            $meta_key = 'post_views_count';
            (int)$count = get_post_meta( $post->ID, $meta_key, true ) ?: 0;
            if ( ! $count ) {
                add_post_meta( $post->ID, $meta_key, '0' );
            }
            $count ++;
            update_post_meta( $post->ID, $meta_key, $count );
        }
    }    
}