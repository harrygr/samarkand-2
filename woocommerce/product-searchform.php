<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text sr-only" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
	<div class="input-group">
	<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
	<span class="input-group-btn">
		<input type="submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" />
	</span>
	</div>
	<input type="hidden" name="post_type" value="product" />
</form>
