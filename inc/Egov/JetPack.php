<?php
/**
 * @package MPTC_THEME
 */

namespace App\Egov;

use App\Base\BaseController;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JetPack extends BaseController
{
    
    public function register() {
        add_action( 'after_setup_theme', array( $this, 'callbackFunction' ) );
    }

    function callbackFunction() {
        // Add theme support for Infinite Scroll.
        add_theme_support(
            'infinite-scroll',
            array(
                'type'      => 'scroll',
                'container' => 'main',
                'render'    => array( $this, 'infiniteScrollRender' ),
                'footer'    => 'page',
            )
        );
    }

    public function infiniteScrollRender() {
        while ( have_posts() ) {
            the_post();
            if ( is_search() ) :
                get_template_part( 'template-parts/content', 'search' );
            else :
                get_template_part( 'template-parts/content', get_post_type() );
            endif;
        }
    }   
     
}