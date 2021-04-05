{{--
  Template Name: Blank template
  Template Post Type: page, post
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-blank')
  @endwhile
@endsection
