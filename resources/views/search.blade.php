@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
      <p>
        {!! __('Sorry, no results were found.', 'sage') !!}
      </p>
      {!! get_search_form(false) !!}
    </div>
  @endif
  <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    @while(have_posts()) @php(the_post())
      @include('partials.content-search')
    @endwhile
  </div>
  <div class="container mb-3">
    @include('partials.paginate-link')
  </div>
@endsection
