
<section class="header bg-gradient1 position-relative mb-0 mb-lg-4">
  <div id="particles-js" class="d-none d-lg-block position-absolute top-0 bottom-0 start-0 end-0"></div>
  
  <header class="container d-flex align-items-center justify-content-between px-1 px-sm-2 px-md-3 py-1 py-sm-2 py-md-3 py-lg-4 position-relative">
    <figure class="d-flex align-items-center mb-0">
      <a 
        @if ( function_exists( 'pll_home_url' ) )
          href="{{ pll_home_url() }}"
        @else
          href="{{ home_url('/') }}"
        @endif
      >
        <picture class="me-1 me-sm-2 me-md-3 me-lg-4">
          @if ( get_theme_mod( 'logo_large_setting_id' ) )                
            <source media="(min-width: 992px)" srcset="{{ wp_get_attachment_url( get_theme_mod( 'logo_large_setting_id' ) ) }}" type="image/jpeg">
          @else
            <source media="(min-width: 992px)" srcset="{{ get_stylesheet_directory_uri() }}/resources/images/logo@4x.png" type="image/jpeg">
          @endif
          
          @if ( get_theme_mod( 'logo_medium_setting_id' ) )                
            <source media="(min-width: 768px)" srcset="{{ wp_get_attachment_url( get_theme_mod( 'logo_medium_setting_id' ) ) }}" type="image/jpeg">
          @else
            <source media="(min-width: 768px)" srcset="{{ get_stylesheet_directory_uri() }}/resources/images/logo@3x.png" type="image/jpeg">
          @endif
          
          @if ( get_theme_mod( 'logo_small_setting_id' ) )                
            <source media="(min-width: 768px)" srcset="{{ wp_get_attachment_url( get_theme_mod( 'logo_small_setting_id' ) ) }}" type="image/jpeg">
          @else
            <source media="(min-width: 768px)" srcset="{{ get_stylesheet_directory_uri() }}/resources/images/logo@2x.png" type="image/jpeg">
          @endif
          
          @if ( get_theme_mod( 'logo_xsmall_setting_id' ) )                
            <source media="(max-width: 575px)" srcset="{{ wp_get_attachment_url( get_theme_mod( 'logo_xsmall_setting_id' ) ) }}" type="image/jpeg">
            <img src="{{ wp_get_attachment_url( get_theme_mod( 'logo_xsmall_setting_id' ) ) }}" type="image/jpeg">
          @else
            <source media="(max-width: 575px)" srcset="{{ get_stylesheet_directory_uri() }}/resources/images/logo@1x.png" type="image/jpeg">
            <img src="{{ get_stylesheet_directory_uri() }}/resources/images/logo@1x.png" type="image/jpeg">
          @endif
        </picture>
      </a>
      <figcaption class="title">
        <h1 class="site-title">{{ $site_name }}</h1>
        <div class="tagline">{{ $site_description }}</div>
      </figcaption>
    </figure>
    <div class="d-flex">
      <nav class="social d-none d-lg-block">
        @if ( has_nav_menu( 'social_menu' ) )
          {!! 
            wp_nav_menu( 
              [
                'theme_location' => 'social_menu',
                'container' => 'ul',
                'menu_class' => false

              ]
            ) 
          !!}
        @endif
      </nav>
      <div class="d-none d-lg-block search-icon text-center me-3 color-gray-500" data-bs-toggle="modal" data-bs-target="#searchModal">
        <i class="icofont-search-1"></i>
        <div class="caption">{{ __( 'SEARCH', 'sage' ) }}</div>
      </div>

      @if( function_exists( 'pll_the_languages' ) )
        <div class="d-none d-lg-block dropdown dropdown-language color-gray-500">
          @php
            $args = [
              'hide_if_empty' => 0,
              'raw' => 1
            ];
          @endphp
          @foreach ( pll_the_languages( $args ) as $key => $value )
            @if ( pll_current_language() === $value['slug'] )
              <div class="dropdown-active d-flex" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                <figure class="mb-0 text-center me-1">
                  <img class="mb-0" src="{{ get_stylesheet_directory_uri() }}/resources/images/{{ $value['slug'] }}.png" alt="{{ $value['name'] }}">
                  <figcaption>{{ $value['name'] }}</figcaption>
                </figure>
                <div class="align-middle">
                  <i class="icofont-simple-down"></i>
                </div>
              </div>
            @endif
          @endforeach
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
            @foreach ( pll_the_languages( $args ) as $key => $value )
              @if ( pll_current_language() != $value['slug'] )
                <li>
                  <a class="dropdown-item" href="{{ $value['url'] }}">
                    <figure class="mb-0 d-flex align-items-center">
                      <img class="me-1 lh-1" height="16" src="{{ get_stylesheet_directory_uri() }}/resources/images/{{ $value['slug'] }}.png" alt="{{ $value['name'] }}">
                      <figcaption>{{ $value['name'] }}</figcaption>
                    </figure>
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </div>
      @endif

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
      @if (has_nav_menu('main_menu'))
        {!! 
          wp_nav_menu([
            'theme_location' => 'main_menu',
            'container' => false
          ]) 
        !!}
      @endif
    </nav>
  </div>
</section>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <form action="index.html" method="GET">
          <div class="input-group mb-0">
            <input name="s" type="search" class="form-control" placeholder="{{ __( 'Key Word', 'sage' ) }}" aria-label="{{ __( 'SEARCH', 'sage' ) }}" aria-describedby="button-search">
            <button class="btn btn-outline-secondary" type="submit" id="button-search">{{ __( 'SEARCH', 'sage' ) }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>