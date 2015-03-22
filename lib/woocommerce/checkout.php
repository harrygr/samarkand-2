<?php
/**
 * Filter the default WooCommerce Credit Card form fields to provide bootstrap styling
 * @param  Array $fields The default fields
 * @param  string $id The identifier of the gateway
 * @return Array An array of the payment fields
 */
function custom_credit_card_fields($fields, $id)
{
    $args['fields_have_names'] = 0;
    $fields = array(
        'card-number-field' => '<p class="form-row form-row-wide form-group col-md-6">
		<label for="' . esc_attr( $id ) . '-card-number">' . __( 'Card Number', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-number" class="form-control input-text wc-credit-card-form-card-number" type="text" maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="' . ( $args['fields_have_names'] ? 1 . '-card-number' : '' ) . '" />
		</p>',
        'card-expiry-field' => '<p class="form-row form-row-first form-group col-md-3 col-sm-6 col-xs-12">
		<label for="' . esc_attr( $id ) . '-card-expiry">' . __( 'Expiry (MM/YY)', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-expiry" class="form-control input-text wc-credit-card-form-card-expiry" type="text" autocomplete="off" placeholder="' . __( 'MM / YY', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? 1 . '-card-expiry' : '' ) . '" />
		</p>',
        'card-cvc-field' => '<p class="form-row form-row-last form-group col-md-3 col-sm-6 col-xs-12">
		<label for="' . esc_attr( $id ) . '-card-cvc">' . __( 'Card Code', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-cvc" class="form-control input-text wc-credit-card-form-card-cvc" type="text" autocomplete="off" placeholder="' . __( 'CVC', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? 1 . '-card-cvc' : '' ) . '" />
		</p>',
        'card-info-message'	=>	'<div class="clearfix"></div><p class="col-sm-12">Payment is processed securely by <a href="http://stripe.com" title="Stripe Website" target="_blank">Stripe</a>. ' . get_bloginfo('name') . ' does not store your card details.</p>'
    );
    return $fields;
}
add_filter( 'woocommerce_credit_card_form_fields' , 'custom_credit_card_fields', 10, 2 );