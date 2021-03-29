<?php
/**
 * @package sage
 */

namespace App\Egov;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use App\Base\BaseController;

class CMB2 extends BaseController
{
    public function register() {
        add_action( 'cmb2_admin_init', array( $this, 'init' ) );
    }

    public function init() {

    }
}