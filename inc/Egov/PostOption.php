<?php
/**
 * @package MPTC_THEME
 */

namespace App\Egov;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use App\Base\BaseController;

class PostOption extends BaseController
{
    public function register() {
        add_action( 'cmb2_admin_init', [ $this, 'init' ] );
    }

    public function init() {

        $cmb = new_cmb2_box([
            'id'            => 'post_option',
            'title'         => 'Post Options',
            'object_types'  => ['page', 'post']
        ]);
        
        $cmb->add_field([
            'name'      => 'Disable Options',
            'id'        => 'post_option_multicheck',
            'type'    => 'multicheck',
            'options' => array(
                'header' => 'Disable Header',
                'date' => 'Disable Post Date',
                'view' => 'Disable Post View Count',
                'author' => 'Disable Post Author',
                'share' => 'Disable Share Button',
                'related' => 'Disable Related Posts',
                'footer' => 'Disable Footer',
            )
        ]);
    }
}