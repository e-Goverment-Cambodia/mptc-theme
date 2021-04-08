<figure class="row g-2 g-sm-3">
  <div class="col-12 col-sm-4 thumbnail">
    <a href="{{ get_permalink() }}">
      <div class="ratio ratio-16x9 ratio-sm-4x3 ratio-md-4x3 ratio-lg-16x9">
        <div style="background-image: url('{{ get_the_post_thumbnail_url() }}');"></div>
      </div>
    </a>
  </div>
  <figcaption class="col figcaption">
    @include('partials/term-list')
    <h5 class="title mb-0 mb-1 mb-sm-1 mb-lg-2 text-break"><a href="{{ get_permalink() }}">{!! $title !!}</a></h5>
    <p class="excerpt mb-0 mb-sm-1 mb-lg-2 text-break">
      {{ get_the_excerpt() }}
    </p>
    @include('partials/entry-meta')
  </figcaption>
</figure>
