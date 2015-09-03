<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <?php wp_head(); ?>
<?php if ($header_bg_image = of_get_option('header_bg_image') ) : ?>
<!-- custom header image: -->
<style type="text/css">
  #header, #footer {
    background-image: url("<?php echo $header_bg_image; ?>");
  }
</style>
<?php endif; ?>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.ico">
  
  <?php if (woocommerce_active()) { ?>
  <meta name="wc_cart_url" content="<?php echo WC()->cart->get_cart_url(); ?>" />
  <meta name="wc_shop_url" content="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" />
  <?php } ?>
</head>
