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

  <div class="entry-content mb-3 mb-lg-4">


    <div class="">

      @if ( get_post_meta( get_the_id(), 'cam_portal_dept_address', true ) )
      <ul class="list-unstyled">
        <li class="">
          {{ __( 'Address : ', 'sage' ) }}
          {!! get_post_meta ( get_the_id(), 'cam_portal_dept_address', true ) !!}
          
        </li>
      </ul>
      @endif
  
      @if ( get_post_meta ( get_the_id(), 'cam_portal_dept_address_maps', true ) )
      <div class="embed-responsive embed-responsive-16by9 mb-3 mb-md-6">
        <iframe
          width="600"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBbTDKtoivLuALOMTXcUViLnQZxNCuHdeA&q={{ get_post_meta ( get_the_id(), 'cam_portal_dept_address_maps', true ) }}" 
          allowfullscreen>
        </iframe>
      </div>
      @endif
      @if ( is_array( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) ) && count ( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) ) )
      <ul class="list-unstyled mb-0">
        <li class="item-wrap">
          <span class="item-title primary-color mb-3 d-block">{{ __( 'Contact : ', 'sage') }}</span>
          <table class="table table-borderless table-responsive">
            <tbody>
              @foreach ( get_post_meta( get_the_id(), 'cam_portal_dept_contact_group', true ) as $item )
                <tr>
                  @if ( array_key_exists('contact_name', $item) )
                    <td>{{ $item['contact_name'] }}</td>
                  @else
                    <td>&nbsp;</td>
                  @endif

                  @if ( array_key_exists('contact_position', $item) )
                    <td>{{ $item['contact_position'] }}</td>
                  @else
                    <td>&nbsp;</td>
                  @endif

                  @if ( array_key_exists('contact_number', $item) )
                    <td>{{ $item['contact_number'] }}</td>
                  @else
                    <td>&nbsp;</td>
                  @endif

                  @if ( array_key_exists('contact_email', $item) )
                    <td>{{ $item['contact_email'] }}</td>
                  @else
                    <td>&nbsp;</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </li>
      </ul>
      @endif
    </div>


  </div>

  <div class="block-title mb-2 mb-sm-2 mb-md-3 mb-lg-4">
    <h2>{{ __("Other Organization","egov") }}</h2>
  </div>
  @include('partials.related-organization')
</article>
