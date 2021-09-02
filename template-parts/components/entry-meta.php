<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;
?>

<ul class="meta list-unstyled p-0 mb-1 mb-sm-2 mb-md-3 mb-lg-4">
    <li class="list-inline-item post-date">
      <time title="<?php the_date() ?>" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><i class="icofont-clock-time"></i> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') )?> <?php __( ' ago' ) ?></time>
    </li>
    <?php 
        $view = new BaseController;
        if ( $view-> postViewCount() ) :
    ?>
    <li class="list-inline-item post-view">
     <?php echo $view->postViewCount(); ?>
    </li>
    <?php 
        endif;
    ?>
    <li class="list-inline-item post-author">
      <i class="icofont-user-alt-3"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>"> <?php echo get_the_author() ?></a>
    </li>
</ul>