<?php
/*
Plugin Name:    WooCommerce Rial Currency
Description:    Adds Rial currency to WooCommerce plugin.
Author:         Hassan Derakhshandeh
Version:        0.1
Author URI:     http://tween.ir/


		* 	Copyright (C) 2012  Hassan Derakhshandeh
		*	http://tween.ir/
		*	hassan.derakhshandeh@gmail.com

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class WC_Rial_Currency {

	public function __construct() {
		add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ), 0 );
		add_filter( 'woocommerce_currencies', array( &$this, 'add_currency' ) );
		add_filter( 'woocommerce_currency_symbol', array( &$this, 'currency_symbol' ), 1, 2 );
	}

	/**
	 * Load Plugin textdomain.
	 *
	 * @return void.
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'wcrial', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Add Rial Currency in WooCommerce.
	 *
	 * @param  array $currencies Current currencies.
	 * @return array
	 */
	public function add_currency( $currencies ) {
		$currencies['IRR'] = __( 'Iranian Rial (&#1585;&#1740;&#1575;&#1604;)', 'wcrial' );
		asort( $currencies );

		return $currencies;
	}

	/**
	 * Add Rial Symbol
	 *
	 * @param  string $currency_symbol Currency symbol.
	 * @param  array  $currency        Current currencies.
	 * @return string
	 */
	public function currency_symbol( $currency_symbol, $currency ) {
		switch( $currency ) {
			case 'IRR':
				$currency_symbol = '&#1585;&#1740;&#1575;&#1604;';
				break;
		}

		return $currency_symbol;
	}
}
new WC_Rial_Currency;