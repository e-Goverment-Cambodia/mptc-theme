@php
$pdf = get_post_meta( get_the_ID(), '_mptc_document_file', true );
@endphp
@if ( $pdf )
@php
$chetra_pdf_url = \App\Base\BaseController::formatChetraDocument( $pdf );
@endphp
<iframe src="https://docs.google.com/gview?url={{ $chetra_pdf_url }}&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>
<div class="mb-5">
    <i class="text-success icofont-download"></i>
    <a href="{{ $chetra_pdf_url }}">
    {{ __( 'Download', 'sage' ) }}
    </a>
</div>
@endif