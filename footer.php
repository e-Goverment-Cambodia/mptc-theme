<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MPTC_THEME
 */

use App\Base\BaseController;
?>

<?php 
    $arg = [
        'pid' => get_the_ID(),
        'option' => 'post_option_multicheck',
        'key' => 'footer'
    ];
    $base = new BaseController;
    if( $base->getPostOption( $arg ) ) {
        dynamic_sidebar( 'footer' ); 
    }
?>

<?php wp_footer(); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5094a6d148768b69"></script>
</body>
</html>
