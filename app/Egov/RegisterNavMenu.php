<?php
/**
 * @package sage
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
            'social_menu' => __( 'Social Menu', 'sage' ),
            'main_menu' => __( 'Main Menu', 'sage' ),
            'footer_menu' => __( 'Footer Menu', 'sage' )
        ];
        register_nav_menus( $args );
    }    
}