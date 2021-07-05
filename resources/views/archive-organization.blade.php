@extends('layouts.app')

@section('content')
  {{-- <div class="container">
    @include('forms.search-organization')
  </div> --}}
  {{-- taxonomy-organization_type --}}
  {{-- @include('partials.page-header') --}}
  <section class="container mt-2">
    <div class="block-title mb-1 mb-sm-2 mb-md-3 mb-lg-4">
      <h2>{{ __( 'Provincial Organization', 'sage' ) }}</h2>
    </div>
  </section>

  @if (! have_posts())
  <div class="container mb-3">
    <h5 class="mb-2 mb-md-3">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </h5>
    {!! get_search_form(false) !!}
  </div>
  @endif
  
  {{-- <div class="container mb-6">
    <section class="section">
      <div class="collapsible">
          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile
      </div>
    </section>
  </div> --}}

  <div class="container mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    <table class="table table-striped1 table-hover">
      <tbody>
        @while(have_posts()) @php(the_post())
          <tr>
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          </tr>
        @endwhile
      </tbody>
    </table>
  </div>

  <div class="container">
    @include('partials.paginate-link')
  </div>
@endsection