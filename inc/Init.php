<?php
/**
 * @package MPTC_THEME
 */

namespace App;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Init
{
    function __construct() {

    }

    public static function getServices() {
        return [
            Egov\Setup::class,
            Egov\RegisterAsset::class,
            Egov\CMB2::class,
            Egov\CustomizeLogo::class,
            Egov\RegisterNavMenu::class,
            Egov\PostViewCount::class,
            Egov\RegisterWidget::class,
            Egov\RegisterSidebar::class,
            Egov\PostOption::class
        ];
    }

    public static function registerServices() {
        foreach( self::getServices() as $class ) {
            $service = self::instantiate( $class );
            if( method_exists( $service, "register" ) ) {
                $service->register();
            }
        }
    }

    private static function instantiate( $class ) {
        $service = new $class();
        return $service;
    }
}