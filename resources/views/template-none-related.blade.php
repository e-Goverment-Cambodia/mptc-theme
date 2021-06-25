{{--
  Template Name: None related template
  Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-none-related')
  @endwhile
@endsection