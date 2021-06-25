@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
  <div class="container mb-3">
    <h5 class="mb-2 mb-md-3">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </h5>
    {!! get_search_form(false) !!}
  </div>
  @endif

  @php
    $custom_template = get_term_meta( get_queried_object_id(), 'cmb_category_template', true )
  @endphp

  @switch( $custom_template )
    @case( 'document' )
      <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
        <table class="table table-striped1">
          {{-- <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{ __( 'Title', 'egov' ) }}</th>
            </tr>
          </thead> --}}
          <tbody>
            @php
              $i = 1;
              if ( get_query_var('paged') ) {
                $i = 1 + ( get_option('posts_per_page') * ( get_query_var('paged') - 1 ) );
              }
            @endphp
          @while(have_posts()) @php(the_post())
            <tr>
              {{-- <td>
                {{ $i++ }}
              </td> --}}
              @include('partials.content-pdf')
            </tr>
          @endwhile
          </tbody>
        </table>
      </div>
      @break
    @default
      <div class="container mb-2 mb-sm-2 mb-md-3 mb-lg-4">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
      </div>
  @endswitch


  <div class="container">
    @include('partials.paginate-link')
  </div>
@endsection

