@php
    global $post;
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID) ) );    
@endphp
@php
    $i = 1;
@endphp
@if( $related ) 
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __( 'Title', 'egov' ) }}</th>
      </tr>
    </thead>
    <tbody>
    @foreach( $related as $post )
        @php( setup_postdata($post) )
        <tr>
            <td>
                {{ $i++ }}
            </td>
            @include('partials.content-pdf')
        </tr>
    @endforeach
    </tbody>
</table>   
    @php( wp_reset_postdata() )
@endif
