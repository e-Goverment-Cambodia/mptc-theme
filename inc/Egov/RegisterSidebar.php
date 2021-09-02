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

class RegisterSidebar extends BaseController
{
    
    public function register() {
        add_action( 'widgets_init', array( $this, 'registerSidebar' ) );
    }

    public function registerSidebar() {
        register_sidebar(
            [
                'name' => 'Header',
                'id' => 'header',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h3 class="d-none">',
                'after_title' => '</h3>'
            ] 
        );

        register_sidebar(
            [
                'name' => 'Footer',
                'id' => 'footer',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h3 class="d-none">',
                'after_title' => '</h3>'
            ] 
        );
    }   
     
}