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
        $this->meta_key_view_count = 'post_views_count';
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

    public static function getTheTermList( int $post_id, array $taxonomy, string $before = '', string $sep = '', string $after = '' ) {

        // Determines whether the taxonomy name exists.
        $exist_tax = [];
        foreach( $taxonomy as $tax ) {
            if ( taxonomy_exists( $tax ) ) {
                array_push( $exist_tax, $tax );
            }
        }

        $terms = wp_get_post_terms( $post_id, $exist_tax );
 
        if ( is_wp_error( $terms ) ) {
            return;
        }
    
        if ( empty( $terms ) ) {
            return false;
        }
        
        $links = array();
    
        foreach ( $terms as $term ) {
            $link = get_term_link( $term->term_id, $term->taxonomy );
            if ( is_wp_error( $link ) ) {
                return $link;
            }
            $links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $term->name . '</a>';
        }
    
        return $before . implode( $sep, $links ) . $after;
    }

    public static function formatChetraDocument( $document = '' ) {
        $url = get_site_url();
        $upload_url = wp_upload_dir();
        /**
        * ឆែកមើលបើសិន Document file អត់មានផ្ទុក home url
        * _mptc_document_file ជា custom meta key ដែលកើតមាននៅពេល Active MPTC Field Plugin
        * ត្រូវបន្ថែម Upload Directory ទៅកាន់ Link ជាមុន (សម្រាប់ទិន្នន័យពី Website ចាស់)
        */
        if(strpos($document, $url) !== false){
            $d_link = $document;
        }elseif(strpos($document, 'http://files') == 0){
            $new_doc = preg_replace('#http://(files\.)?#i', '', $document);
            $d_link = $upload_url['baseurl'].'/'. $new_doc;
        }else{
            $d_link = $upload_url['baseurl'].'/'. $document;
        }
        
        return $d_link;
    }
}