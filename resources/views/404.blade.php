@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container">
    @if (! have_posts())
      <h5 class="mb-2 mb-md-3">
        {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
      </h5>
  
      {!! get_search_form(false) !!}
    @endif
  </div>
@endsection
