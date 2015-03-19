jQuery(function($){
    // use the custom woocommerce cookie to determine if the empty cart icon should show in the header or the full cart icon should show
    var cartCount = $.cookie("woocommerce_cart_count");
    var cartTotal = $.cookie("woocommerce_cart_total");
    if ( typeof(cartTotal) === "undefined") cartTotal = "£0.00";

    var cart_url = $('meta[name=wc_cart_url]').attr('content');
    var shop_url = $('meta[name=wc_shop_url]').attr('content');

    if (typeof(cartCount) !== "undefined" && parseInt(cartCount, 10) > 0) {
        $('#micro-cart .cart_link').html(cartCount + ' items');
        $('#micro-cart .cart_link').attr('href', cart_url);
    } else {
        $('#micro-cart .cart_link').html('Basket Empty');
        $('#micro-cart .cart_link').attr('href', shop_url);
    }
    $('#micro-cart .cart_amount').html(cartTotal);
});