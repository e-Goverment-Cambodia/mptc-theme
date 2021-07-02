
@include('partials.style')
<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <form action="/" method="GET">
          <div class="input-group mb-0">
            <input name="s" type="search" class="form-control" placeholder="{{ __( 'Key Word', 'sage' ) }}" aria-label="{{ __( 'SEARCH', 'sage' ) }}" aria-describedby="button-search">
            <button class="btn btn-outline-secondary bg-gradient color-white" type="submit" id="button-search">{{ __( 'SEARCH', 'sage' ) }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@php( dynamic_sidebar( 'header' ) )