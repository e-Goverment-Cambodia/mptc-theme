<?php
/**
 * @package sage
 */

namespace App\Egov;

use App\Base\BaseController;
use App\Egov\Widget\HeaderOne;
use App\Egov\Widget\HeaderTwo;
use App\Egov\Widget\HeaderThree;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class RegisterWidget extends BaseController
{
    
    public function register() {
        add_action( 'widgets_init', array( $this, 'registerWidget' ) );
    }

    public function registerWidget() {
        register_widget( new HeaderOne );
        register_widget( new HeaderTwo );
        register_widget( new HeaderThree );
    }   
     
}