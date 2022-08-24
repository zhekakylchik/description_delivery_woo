/**
 * @snippet       Function to display a message for the selected delivery method
 * @param  object $method delivery method object
 * @param  int    $index  
 */
function art_action_after_shipping_rate( $method, $index ) {

	// If this is basket, then we do not display anything
	if ( is_cart() ) {
		return;
	}

	$style = '<style>
			.order-notice {
				padding: 20px 20px;
				border: none;
				margin-bottom: 30px;
				text-align: center;
				font-weight: normal;
				text-transform: none;
				position: fixed;
				bottom: 0;
				z-index: 100000;
				box-shadow: -10px -10px 30px 4px rgba(0, 0, 0, 0.1), 10px 10px 30px 4px rgba(45, 78, 255, 0.15);
				width: 100%;
				max-width: 1000px;
				left: 50%;
				transform: translateX(-50%) translateY(-50%);
			}
		</style>';

	// Get the selected method
	$chosen_methods = WC()->session->get( 'chosen_shipping_methods' );

	if ( 'flat_rate:3' === $chosen_methods[0] && 'flat_rate:3' === $method->id ) {
		// Message for specific delivery method
		echo $style;
		?>

		<div class="order-notice" style="color: #fff; background-color: green">
			Attention! The cost of delivery can be changed if you are outside the Moscow Ring Road or your order is oversized. Check with our managers.
		</div>
		<?php

	}

	if ( 'free_shipping:4' === $chosen_methods[0] && 'free_shipping:4' === $method->id ) {
		echo $style;
		?>

		<div class="order-notice" style="color: #fff;background-color: red;">
			Attention! Free shipping is available for orders over 10k rubles)
		</div>
		<?php

	}

}
