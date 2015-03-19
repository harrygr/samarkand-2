<?php

// Declare WooCommerce Support
//add_action( 'after_setup_theme', 'woocommerce_support' );
//function woocommerce_support() {
    add_theme_support( 'woocommerce' );
//}


// Remove default styles
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

//Hide the "add to cart button" on shop pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_woocommerce_loop_add_to_cart_link' );
function custom_woocommerce_loop_add_to_cart_link( $button ) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

// Hide unwanted tabs
add_filter( 'woocommerce_product_tabs', 'samarkand_remove_product_tabs', 98 );
function samarkand_remove_product_tabs( $tabs ) {
    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}


// attach my open 'section' function to the before product summary action
add_action( 'woocommerce_before_single_product_summary', 'samarkand_open_6_column', 1 );
// attach my close 'section' function to the after product summary action
add_action( 'woocommerce_before_single_product_summary', 'samarkand_close_column', 99 );

function samarkand_open_6_column()
{
    samarkand_open_column(6);
}

function samarkand_open_column($width = 6)
{
    echo sprintf('<div class="col-md-%s">', $width);
}
function samarkand_close_column()
{
    echo '</div>';
}

//add_filter( 'woocommerce_single_product_image_thumbnail_html', 'myfilt');

function myfilt($thumb)
{
    $thumb = str_replace('class="', 'class="col-sm-4 ', $thumb);
    return $thumb;
}

// Hide the SKU on front end
if (!is_admin())
{
    add_filter( 'wc_product_sku_enabled', '__return_false' );
}

// Update the custom cart cookie
// this should only ever fire on non-cached pages (so it SHOULD fire
// whenever we add to cart / update cart / etc
function update_cart_total_cookie() {
    $cart_total = WC()->cart->get_cart_total();
    $cart_count = WC()->cart->cart_contents_count;
    setcookie('woocommerce_cart_count', $cart_count, 0, '/');
    setcookie('woocommerce_cart_total', $cart_total, 0, '/');
}

if(!is_admin()){
    add_action('send_headers', 'update_cart_total_cookie', 99);
}
function outputShit()
{
    var_dump(['shit', 'poo']);
}

function sd_output_breadcrumbs()
{
    echo '<div class="col-md-12">';
    woocommerce_breadcrumb();
    echo '</div>';
}
add_action('woocommerce_before_main_content', 'outputShit', 20, 0);

