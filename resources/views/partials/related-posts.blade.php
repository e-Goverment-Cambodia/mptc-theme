@php
    global $post;
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID) ) );    
@endphp
@if( $related ) 
<ul class="slick-slide-show p-0 row gx-3" data-slick='{ "autoplay": true, "slidesToShow": 3, "slidesToScroll": 3, "dots": true, "responsive": [ { "breakpoint": 992, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }, { "breakpoint": 768, "settings": { "slidesToShow": 2, "slidesToScroll": 2 } }, { "breakpoint": 576, "settings": { "slidesToShow": 1,  "slidesToScroll": 1 } } ] }'>
    @foreach( $related as $post )
        @php( setup_postdata($post) )
            <li class="px-2">
                
                <figure class="p-0 m-0">
                    <div class="thumbnail mb-0 mb-1 mb-sm-1 mb-lg-2">
                      <a href="{{ get_the_permalink() }}">
                        <div class="ratio ratio-16x9 ratio-sm-16x9 ratio-md-16x9 ratio-lg-16x9">
                          <div style="background-image: url('{{ get_the_post_thumbnail_url() }}');"></div>
                        </div>
                      </a>
                    </div>
                    <figcaption class="figcaption">
                        @include('partials/term-list')  
                        <h5 class="title mb-0 mb-1 mb-sm-1 mb-lg-2"><a href="{{ get_the_permalink() }}" title="{{ get_the_title() }}">{{ get_the_title() }}</a></h5>
                        @include('partials/entry-meta')
                    </figcaption>
                </figure>
            </li>
    @endforeach
</ul>   
    @php( wp_reset_postdata() )
@endif
