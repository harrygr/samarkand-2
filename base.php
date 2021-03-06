<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap" role="document">
    <div class="">

      <header id="header" class="col-sm-4 col-md-3">
        <a href="<?php bloginfo('url'); ?>" class="image avatar">
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width;?>">
        </a>
        <h1><?php bloginfo('description'); ?></h1>
      </header>

      <div class="col-sm-8 col-md-9 col-sm-offset-4 col-md-offset-3">

        <?php if ( of_get_option('show_shop_sidebar') and woocommerce_active() and is_woocommerce()) : ?>
          <aside class="sidebar row">
            <?php dynamic_sidebar('sidebar-shop'); ?>
            <div class="col-xs-12"><hr/></div>
          </aside>
        <?php endif; ?>

        <main id="main" class="main" role="main">

        <?php if ( of_get_option('store_notice_visible') and woocommerce_active() and (is_woocommerce() or is_page(['cart', 'checkout']))) { ?>
        <div class="alert alert-info"><?php echo of_get_option('store_notice_content') ?></div>
        <?php } ?>


        <?php if ( woocommerce_active() and is_woocommerce() )  woocommerce_breadcrumb(); ?>

          <?php include roots_template_path(); ?>
          <hr class="content-separator">
        </main><!-- /.main -->



        <?php if (roots_display_sidebar()) : ?>
          <aside class="sidebar row" role="complementary">

            <?php include roots_sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div>

    </div><!-- /.content -->
  </div><!-- /.wrap -->
  <?php //get_template_part('templates/popout-sidebar'); ?>

  <?php get_template_part('templates/footer'); ?>
  <?php wp_footer(); ?>

</body>
</html>
