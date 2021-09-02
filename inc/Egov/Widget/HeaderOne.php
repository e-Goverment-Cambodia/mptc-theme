<?php
/**
 * @package MPTC_THEME
 */

namespace App\Egov\Widget;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HeaderOne extends \WP_Widget
{
    public function __construct() {
        // Instantiate the parent object.
        parent::__construct( 'widgetheader1', __( 'Header One' ) );
    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        ?>
        <section class="header position-relative mb-0 mb-lg-4">
            <div id="particles-js" class="d-none d-lg-block position-absolute top-0 bottom-0 start-0 end-0"></div>
            <header class="container d-flex align-items-center justify-content-between px-2 px-sm-2 px-md-3 py-2 py-sm-2 py-md-3 py-lg-4 position-relative">
                <figure class="d-flex align-items-center mb-0">
                    <a 
                        <?php
                        if ( function_exists( 'pll_home_url' ) ) :
                        ?>

                        href="<?php echo pll_home_url() ?>"
                        <?php
                        else :
                        ?>
                        href="<?php echo home_url('/') ?>"

                        <?php
                        endif
                        ?>
                    >
                        <?php
                            $base = get_stylesheet_directory_uri() . "/resources/images/";
                            
                            $large_logo = $base . "LargeLogo.png";
                            $large_logo_2x = $base . "LargeLogo@2x.png";

                            $medium_logo = $base . "MediumLogo.png";
                            $medium_logo_2x = $base . "MediumLogo@2x.png";

                            $small_logo = $base . "SmallLogo.png";
                            $small_logo_2x = $base . "SmallLogo@2x.png";

                            if ( get_theme_mod( 'logo_large_setting_id' ) && get_theme_mod( 'logo_large_setting_2x_id' ) ) {
                                $large_logo = wp_get_attachment_url( get_theme_mod( 'logo_large_setting_id' ) );
                                $large_logo_2x = wp_get_attachment_url( get_theme_mod( 'logo_large_setting_2x_id' ) );
                            }

                            if ( get_theme_mod( 'logo_medium_setting_id' ) && get_theme_mod( 'logo_medium_setting_2x_id' ) ) {
                                $medium_logo = wp_get_attachment_url( get_theme_mod( 'logo_medium_setting_id' ) );
                                $medium_logo_2x = wp_get_attachment_url( get_theme_mod( 'logo_medium_setting_2x_id' ) );
                            }
                            
                            if ( get_theme_mod( 'logo_small_setting_id' ) && get_theme_mod( 'logo_small_setting_2x_id' ) ) {
                                $small_logo = wp_get_attachment_url( get_theme_mod( 'logo_small_setting_id' ) );
                                $small_logo_2x = wp_get_attachment_url( get_theme_mod( 'logo_small_setting_2x_id' ) );
                            }
                        ?>
                        <picture class="me-1 me-sm-2 me-md-3 me-lg-4 d-block">
                            <source media="(min-width: 992px)" 
                                srcset="<?php echo $large_logo . ' 1x, '. $large_logo_2x . ' 2x'; ?>" 
                                type="image/jpeg"
                            >
                            
                            <source media="(min-width: 768px)" 
                                srcset="<?php echo $medium_logo . ' 1x, '. $medium_logo_2x . ' 2x'; ?>"
                                type="image/jpeg"
                            >
                            
                            <img 
                                src="<?php echo $small_logo; ?>"
                                srcset="<?php echo $small_logo_2x . ' 2x'; ?>"
                                type="image/jpeg"   
                            >
                        </picture>
                    </a>
                    <figcaption class="title">
                        <h1 class="site-title"><?php echo get_bloginfo( 'name', 'display' ) ?></h1>
                        <div class="tagline"><?php echo get_bloginfo( 'description', 'display' ) ?></div>
                    </figcaption>
                </figure>
                <div class="d-flex align-items-center">
                    <nav class="social d-none d-lg-block">
                        <?php
                        if ( has_nav_menu( 'social_menu' ) ) :
                            wp_nav_menu( [
                                'theme_location' => 'social_menu',
                                'container' => 'ul',
                                'menu_class' => 'd-flex'

                            ] );
                        endif
                        ?>
                    </nav>
                    <div class="d-none d-lg-block search-icon text-center me-3 color-gray-500" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="icofont-search-1"></i>
                        <div class="caption"><?php //echo __( 'SEARCH' ) ?></div>
                    </div>

                    <?php if( function_exists( 'pll_the_languages' ) ) : ?>
                    <div class="d-none d-lg-block dropdown dropdown-language color-gray-500">
                        <?php
                            $args = [
                                'hide_if_empty' => 0,
                                'raw' => 1
                            ];
                        ?>
                        <?php foreach ( pll_the_languages( $args ) as $key => $value ) : ?>
                            <?php if ( pll_current_language() === $value['slug'] ) : ?>
                            <div class="dropdown-active d-flex" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                                <figure class="mb-0 text-center me-1">
                                    <img class="mb-0" src="<?php echo get_stylesheet_directory_uri() ?>/resources/images/<?php echo $value['slug'] ?>.png" alt="<?php echo $value['name'] ?>">
                                    <figcaption><?php //echo $value['name'] ?></figcaption>
                                </figure>
                                <div class="align-middle">
                                    <i class="icofont-simple-down"></i>
                                </div>
                            </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <?php foreach ( pll_the_languages( $args ) as $key => $value ) : ?>
                                <?php if ( pll_current_language() != $value['slug'] ) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo $value['url'] ?>">
                                            <figure class="mb-0 d-flex align-items-center">
                                                <img class="me-1 lh-1" height="16" src="<?php echo get_stylesheet_directory_uri() ?>/resources/images/<?php echo $value['slug'] ?>.png" alt="<?php echo $value['name'] ?>">
                                                <figcaption><?php echo $value['name'] ?></figcaption>
                                            </figure>
                                        </a>
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif ?>

                    <div class="mobile-toggle d-flex align-items-center d-lg-none">
                        <div class="search-icon text-center me-1 me-sm-2 me-md-2 color-gray-300" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="icofont-search-1 d-block m-0"></i>
                        </div>
                        <div class="toggle-nav">
                            <ul>
                                <li></li>
                                <li></li>
                                <li class="mb-0"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
                

            <div class="container">
                <nav id="main-nav" class="nav">
                    <?php
                    if ( has_nav_menu( 'main_menu' ) ) :
                            wp_nav_menu( [
                            'theme_location' => 'main_menu',
                            'container' => false
                        ] );
                        
                    endif
                    ?>
                </nav>
            </div>
        </section>
        <?php
    }
            
    // Creating widget Backend 
    public function form( $instance ) {
        return ''; 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    
}