<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;

$base = new BaseController;
$pid = get_the_ID();
?>

<ul class="meta list-unstyled p-0 mb-1 mb-sm-2 mb-md-3 mb-lg-4">
  <?php 
    $arg = [
      'pid' => $pid,
      'option' => 'post_option_multicheck',
      'key' => 'date'
    ];
    if( $base->getPostOption( $arg ) ) :
      ?>
        <li class="list-inline-item post-date">
          <time title="<?php the_date() ?>" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><i class="icofont-clock-time"></i> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') )?> <?php __( ' ago' ) ?></time>
        </li>
      <?php
    endif;
  ?>
    
  <?php 
    $arg = [
      'pid' => $pid,
      'option' => 'post_option_multicheck',
      'key' => 'view'
    ];
    if ( $base-> postViewCount() && $base->getPostOption( $arg ) ) :
    ?>
      <li class="list-inline-item post-view">
        <?php echo $base->postViewCount(); ?>
      </li>
    <?php 
    endif;
  ?>

  <?php 
    $arg = [
      'pid' => $pid,
      'option' => 'post_option_multicheck',
      'key' => 'author'
    ];
    if ( $base->getPostOption( $arg ) ) :
    ?>
      <li class="list-inline-item post-author">
        <i class="icofont-user-alt-3"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>"> <?php echo get_the_author() ?></a>
      </li>
    <?php 
    endif;
    ?>
</ul>
