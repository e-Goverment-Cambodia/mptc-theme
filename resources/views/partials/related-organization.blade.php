<pre>
@php
    global $post;
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID) ) );    
    $terms = get_terms( ['organization_type', 'sector'] );
    $term_id = [];
    foreach ( $terms as $key => $value ) {
        array_push( $term_id, $value->term_id );
    }
    // print_r($term_id);
    // return;

    $args = [
        'post_type' => get_post_type(),
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'organization_type',
                'field'    => 'term_id',
                'terms'    => $term_id
            ],
            [
                'taxonomy' =>  'sector',
                'field'    => 'term_id',
                'terms'    => $term_id
            ],
        ],
    ];
    $query = new \WP_Query( $args );
@endphp
</pre>
@php
    $i = 1;
    $exclude = $post->ID;
@endphp
@if( $query->have_posts() ) 
    <table class="table table-striped">
        <tbody>
        @while ( $query->have_posts() )
            @php( $query->the_post() )
            @if ( get_the_ID() !== $exclude )
                <tr>
                    @include('partials.content-organization')
                </tr>
            @endif
        @endwhile
        </tbody>
    </table>   
    @php( wp_reset_postdata() )
@endif
