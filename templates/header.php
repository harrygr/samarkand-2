<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>

      <?php if(!isset($woocommerce)) global $woocommerce; ?>
      <p class="navbar-text navbar-right" id="micro-cart">
        <i class="fa fa-shopping-cart"></i>&nbsp;
        <span class="cart_totals">
          <a href="" class="cart_link navbar-link"></a>&nbsp;
          <span class="cart_amount"></span>
        </span>
      </p>
    </nav>
  </div>
</header>
