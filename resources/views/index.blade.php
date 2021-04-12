@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>
    {!! get_search_form(false) !!}
  @endif

  @php
    $custom_template = get_term_meta( get_queried_object_id(), 'cmb_category_template', true )
  @endphp

  @switch( $custom_template )
    @case( 'document' )
      <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{ __( 'Title', 'egov' ) }}</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;
              if ( get_query_var('paged') ) {
                $i = 1 + ( get_option('posts_per_page') * ( get_query_var('paged') - 1 ) );
              }
            @endphp
          @while(have_posts()) @php(the_post())
            <tr>
              <td>
                {{ $i++ }}
                
              </td>
              @include('partials.content-pdf')
            </tr>
          @endwhile
          </tbody>
        <table class="table table-striped">
      </div>
      @break
    @default
      <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
      </div>
  @endswitch


  <div class="container">
    @include('partials.paginate-link')
  </div>
@endsection

