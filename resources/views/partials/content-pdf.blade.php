

<td>
  <div class="figcaption">
    @include('partials/term-list')
    <h5 class="title mb-0 mb-1 mb-sm-1 mb-lg-2 text-break"><a href="{{ get_permalink() }}">{!! $title !!}</a></h5>
    <ul class="meta list-unstyled p-0 m-0">
      {{-- <li class="list-inline-item">
        <time datetime="{{ get_post_time('c', true) }}"><i class="icofont-clock-time"></i> {{ human_time_diff( get_the_time('U'), current_time('timestamp') )}} {{ __( ' ago', 'sage' ) }}</time>
      </li> --}}
      @if ( $view )
      <li class="list-inline-item">
        {!! $view !!}
      </li>
      @endif
      @php
      $pdf = get_post_meta( get_the_ID(), '_mptc_document_file', true );
      @endphp
      @if ( $pdf )
      @php
          $chetra_pdf_url = \App\Base\BaseController::formatChetraDocument( $pdf )
      @endphp
      <li class="list-inline-item">
        <i class="icofont-cloud-download"></i> <a href="{{ $chetra_pdf_url }}">{{ __( 'Download', 'egov' ) }}</a>
      </li>
      @endif
    </ul>
  </div>  
</td>
