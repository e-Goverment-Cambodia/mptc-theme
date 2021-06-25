<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:title" content="<?php the_title() ?>" />
    <meta property="og:description" content="<?php the_excerpt() ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php the_permalink() ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name', 'display') ?>" />
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url() ?>" />
    
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> data-bs-spy="scroll" data-bs-target="#menu-tab" data-bs-offset="10">
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
