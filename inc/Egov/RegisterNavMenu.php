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

class RegisterNavMenu extends BaseController
{
    public function register() {
        add_action( 'after_setup_theme', array( $this, 'registerMenu' ) );
    }

    public function registerMenu() {
        $args = [
            'social_menu' => __( 'Social Menu' ),
            'main_menu' => __( 'Main Menu' ),
            'footer_menu' => __( 'Footer Menu' ),
            'top_menu' => __( 'Top Menu' )
        ];
        register_nav_menus( $args );
    }    
}