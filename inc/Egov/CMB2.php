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

class CMB2 extends BaseController
{
    public function register() {
        add_action( 'cmb2_admin_init', [ $this, 'init' ] );
    }

    public function init() {
        $prefix = 'cmb_';
        $cmb = new_cmb2_box([
            'id'            => $prefix . 'category',
            'title'         => 'Category',
            'object_types'  => ['term'],
            'taxonomies'    => ['category']
        ]);
        $cmb->add_field([
            'name'      => 'Display Template',
            'desc'      => 'Choose the archive template.',
            'id'        => $prefix . 'category_template',
            'type'      => 'radio_inline',
            'options'	=> [
                'default'	=> __( 'Default' ), 
                'document'	=> __( 'Document' ),
            ],
            'default'	=> 'default'
        ]);
    }
}