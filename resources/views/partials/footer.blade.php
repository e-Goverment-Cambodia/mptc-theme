<section class="bg-gray-100">
  <footer class="container">
    <div class="d-sm-flex justify-content-sm-between align-items-center p-2 p-sm-2 p-md-3">
      <div class="d-flex justify-content-center justify-content-sm-start">
        <nav class="social-nav">
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
        @if( function_exists( 'pll_the_languages' ) )
          <div class="dropdown-language">
            <div class="dropdown color-gray-500 dropup">
                @foreach ( pll_the_languages( [ 'hide_if_empty' => 0, 'raw' => 1 ] ) as $key => $value )
                  @if ( pll_current_language() === $value['slug'] )
                    <div class="dropdown-active d-flex" id="dropdownLanguageFooter" data-bs-toggle="dropdown" aria-expanded="false">
                      <figure class="mb-0 text-center me-1">
                        <img src="{{ get_stylesheet_directory_uri() }}/resources/images/{{ $value['slug'] }}.png" alt="{{ $value['name'] }}">
                        <figcaption>{{ $value['name'] }}</figcaption>
                      </figure>
                      <div class="align-middle">
                        <i class="icofont-simple-up"></i>
                      </div>
                    </div>
                  @endif
                @endforeach

              <ul class="dropdown-menu" aria-labelledby="dropdownLanguageFooter">
                @foreach ( pll_the_languages( [ 'hide_if_empty' => 0, 'raw' => 1 ] ) as $key => $value )
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
          </div>
        @endif
      </div>
      <nav class="footer-nav d-flex justify-content-center justify-content-sm-start">
        @if ( has_nav_menu( 'footer_menu' ) )
          {!! 
            wp_nav_menu( 
              [
                'theme_location' => 'footer_menu',
                'container' => 'ul',
                'menu_class' => false

              ]
            ) 
          !!}
        @endif
      </nav>
    </div>
    <hr class="color-gray-400 m-0"/>
    <div class="copyright text-center color-gray-600 p-1 p-sm-2 p-md-3">
      @php( dynamic_sidebar( 'copyright' ) )
    </div>
  </footer>
</section>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5094a6d148768b69"></script>