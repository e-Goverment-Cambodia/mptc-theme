<article class="container mt-2">
  <header class="mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    @include('partials/term-list')
    <div class="block-title mb-1 mb-sm-2">
      <h2>{!! $title !!}</h2>
    </div>
    @include('partials/entry-meta')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_share_toolbox_vjl2 mb-2 mb-md-4"></div>
  </header>

  @include('partials.pdf')

  <div class="entry-content mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    @php(the_content())
  </div>

  <div class="block-title mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    <h2>{{ __("More About This","sage") }}</h2>
  </div>
  @include('partials.related-posts-pdf')
</article>
