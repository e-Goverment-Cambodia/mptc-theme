<?php
/**
 * @package MPTC_THEME
 */

namespace App\Egov;

use App\Base\BaseController;

class PostViewCount extends BaseController
{
    public function register() {
        add_action( 'wp_head', array( $this, 'callBackFunction') );
    }

    public function callBackFunction() {
        global $post;
        if ( is_singular() ) {
            $meta_key = $this->meta_key_view_count;
            (int)$count = get_post_meta( $post->ID, $meta_key, true ) ?: 0;
            if ( ! $count ) {
                add_post_meta( $post->ID, $meta_key, '0' );
            }
            $count ++;
            update_post_meta( $post->ID, $meta_key, $count );
        }
    }    
}