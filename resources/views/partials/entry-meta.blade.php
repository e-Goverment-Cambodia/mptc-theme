<ul class="meta list-unstyled p-0 mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    <li class="list-inline-item">
      <time datetime="{{ get_post_time('c', true) }}"><i class="icofont-clock-time"></i> {{ human_time_diff( get_the_time('U'), current_time('timestamp') )}} {{ __( ' ago', 'sage' ) }}</time>
    </li>
    <li class="list-inline-item">
      {!! $view !!}
    </li>
    <li class="list-inline-item">
      <i class="icofont-user-alt-3"></i> {{ __( 'by ', 'sage' ) }}<a href="{{ get_author_posts_url( get_the_author_meta('ID') ) }}"> {{ get_the_author() }}</a>
    </li>
</ul>