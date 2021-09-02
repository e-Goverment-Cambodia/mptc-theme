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

class Setup extends BaseController
{
    
    public function register() {
        add_action( 'after_setup_theme', array( $this, 'setup' ) );
    }

    public function setup() {
        load_theme_textdomain('mptc', get_template_directory() . '/resources/lang');
    }   
     
}