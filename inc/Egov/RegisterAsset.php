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

class RegisterAsset extends BaseController
{    
    public function register() {
		add_action( "wp_enqueue_scripts", array( $this, "enqueueAssets" ) );
    }

    public function enqueueAssets() {
		wp_enqueue_style( 'mptc-style', get_template_directory_uri() . '/build/index.css' );
		wp_enqueue_script( 'mptc-script', get_template_directory_uri() . '/build/index.js', array ( 'wp-element' ), 1.1, true );
	}
}