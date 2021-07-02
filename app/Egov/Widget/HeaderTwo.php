<?php
/**
 * @package sage
 */

namespace App\Egov\Widget;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HeaderTwo extends \WP_Widget
{
    public function __construct() {
        // Instantiate the parent object.
        parent::__construct( 'widgetheader2', __( 'Header Two', 'sage' ) );
    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        ?>
        <section class="header header-two position-relative mb-0 mb-lg-4">
            <div id="particles-js" class="d-none"></div>
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
                        <picture class="me-1 me-sm-2 me-md-3 me-lg-4">
                            <?php if ( get_theme_mod( 'logo_large_setting_id' ) ) : ?>          
                                <source media="(min-width: 992px)" srcset="<?php echo wp_get_attachment_url( get_theme_mod( 'logo_large_setting_id' ) ) ?>" type="image/jpeg">
                            <?php else : ?>
                                <source media="(min-width: 992px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/resources/images/logo@4x.png" type="image/jpeg">
                            <?php endif ?>
                            
                            <?php if ( get_theme_mod( 'logo_medium_setting_id' ) ) : ?>
                                <source media="(min-width: 768px)" srcset="<?php echo wp_get_attachment_url( get_theme_mod( 'logo_medium_setting_id' ) ) ?>" type="image/jpeg">
                            <?php else : ?>
                                <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/resources/images/logo@3x.png" type="image/jpeg">
                            <?php endif ?>
                            
                            <?php if ( get_theme_mod( 'logo_small_setting_id' ) ) : ?>
                                <source media="(max-width: 767px)" srcset="<?php echo wp_get_attachment_url( get_theme_mod( 'logo_small_setting_id' ) ) ?>" type="image/jpeg">
                                <img src="<?php echo wp_get_attachment_url( get_theme_mod( 'logo_small_setting_id' ) ) ?>" type="image/jpeg">
                            <?php else : ?>
                                <source media="(max-width: 767px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/resources/images/logo@2x.png" type="image/jpeg">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/resources/images/logo@2x.png" type="image/jpeg">
                            <?php endif ?>
                        </picture>
                    </a>
                    <figcaption class="title">
                        <h1 class="site-title primary-color color-gray-800"><?php echo get_bloginfo( 'name', 'display' ) ?></h1>
                        <div class="tagline color-gray-600"><?php echo get_bloginfo( 'description', 'display' ) ?></div>
                    </figcaption>
                </figure>
                <div class="d-flex">
                    <nav class="social d-none d-lg-block">
                        <?php
                        if ( has_nav_menu( 'social_menu' ) ) :
                            wp_nav_menu( [
                                'theme_location' => 'social_menu',
                                'container' => 'ul',
                                'menu_class' => false

                            ] );
                        endif
                        ?>
                    </nav>
                    <div class="d-none d-lg-block search-icon text-center me-3 color-gray-600" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="icofont-search-1"></i>
                        <div class="caption"><?php echo __( 'SEARCH', 'sage' ) ?></div>
                    </div>

                    <?php if( function_exists( 'pll_the_languages' ) ) : ?>
                    <div class="d-none d-lg-block dropdown dropdown-language color-gray-600">
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
                                    <figcaption><?php echo $value['name'] ?></figcaption>
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
                            'container' => false,
                            'menu_class' => 'menu menu-header-two'
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