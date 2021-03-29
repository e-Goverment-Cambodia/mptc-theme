<?php
/**
 * @package sage
 */

namespace App\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BaseController
{
    public $meta_key_view_count;

    public function __construct() {
        $this->meta_key_view_count = 'post_view_count';
    }

    public function formatKMG( $number ) {
        $number_format = number_format_i18n( $number );
        $exploded = explode( ',', $number_format );
        $count = count( $exploded );

        switch ( $count ) {
            case 2:
                $value = number_format_i18n( $number/1000, 1 ) . __( 'K', 'egov' );
                break;
            case 3:
                $value = number_format_i18n( $number/1000000, 1 ) . __( 'M', 'egov' );
                break;
            case 4:
                $value = number_format_i18n( $number/1000000000, 1 ) . __( 'G', 'egov' );
                break;
            default:
                $value = $number;
        }
        return $value;
    }

    public function metaKeyPostViewCount( string $meta_value_num ) {
        $meta_key = apply_filters( 'egov_meta_value_num', $this->meta_key_view_count );
        if( $meta_value_num === 'meta_value_num' ) {
            return $meta_key;
        }
        return false;
    }
}