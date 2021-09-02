<?php
/**
 * @package MPTC_THEME
 */

namespace App\Egov\Widget;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HeaderThree extends \WP_Widget
{
    public function __construct() {
        // Instantiate the parent object.
        parent::__construct( 'widgetheader3', __( 'Header Three' ) );
    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        ?>
        <section class="header-three position-relative mb-0 mb-lg-4">
            <header class="container d-flex align-items-center justify-content-between px-1 px-sm-2 px-md-3 py-1 py-sm-2 py-md-3 py-lg-4">
                <figure class="d-flex mb-0 logo">
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
                        ?>
                        <img 
                            src="<?php echo $base; ?>logo.png"
                            type="image/jpeg"   
                        >
                    </a>
                </figure>
                <div class="d-flex align-items-center">
                    <nav class="social d-none d-lg-block me-3">
                        <?php
                        if ( has_nav_menu( 'top_menu' ) ) :
                            wp_nav_menu( [
                                'theme_location' => 'top_menu',
                                'container' => 'ul',
                                'menu_class' => 'd-flex'

                            ] );
                        endif
                        ?>
                    </nav>
                    <div class="d-none d-lg-block search-icon text-center me-3 color-gray-500" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="icofont-search-1"></i>
                    </div>

                    <?php if( function_exists( 'pll_the_languages' ) ) : ?>
                        <?php
                            $args = [
                                'hide_if_empty' => 0,
                                'raw' => 1
                            ];
                        ?>
                        <div class="d-none d-lg-block color-gray-500">
                            <ul class="language d-flex align-items-center">
                                <?php foreach ( pll_the_languages( $args ) as $key => $value ) : ?>
                                    <?php if ( pll_current_language() === $value['slug'] ) { ?>
                                        <li class="active"><?php echo $value['name'] ?></li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo $value['url'] ?>"><?php echo $value['name'] ?></a></li>
                                    <?php } ?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <div class="mobile-toggle d-flex align-items-center d-lg-none">
                        <div class="search-icon text-center me-1 me-sm-2 me-md-2 color-gray-300" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="icofont-search-1"></i>
                        </div>
                        <div class="toggle-nav">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
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
                            'menu_class' => 'menu menu-header-three'
                        ] );
                        
                    endif
                    ?>
                </nav>
            </div>
            <div id="particles-js" class="d-flex position-absolute bottom-0 start-0 end-0"></div>
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