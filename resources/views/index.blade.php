@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>
    {!! get_search_form(false) !!}
  @endif

  <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
  </div>

  <div class="container">
    @include('partials.paginate-link')
  </div>
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
