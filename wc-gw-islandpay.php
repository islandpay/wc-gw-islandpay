<?php
/*
	Plugin Name: Island Pay WooCommerce Payment Gateway
	Plugin URI: https://github.com/islandpay/islandpay-woocommerce-payment-gateway
	Description: Island Pay WooCommerce Payment Gateway provides your customers a way to pay using the Island Pay mobile app using QR Codes.
	Version: 1.0.0
	Author: Island Pay
	Author URI: https://github.com/islandpay
	License:           GPL-3.0
 	License URI:       https://opensource.org/licenses/GPL-3.0
 	GitHub Plugin URI: https://github.com/islandpay/islandpay-woocommerce-payment-gateway
*/

if (!defined('ABSPATH'))
	exit;

/**
 * Required functions
 */

load_plugin_textdomain('wc-gw-islandpay', false, trailingslashit(dirname(plugin_basename(__FILE__))));

add_action('plugins_loaded', 'wc_islandpay_init', 0);

/**
 * Initialize the gateway.
 *
 */
function wc_islandpay_init()
{
	if (!class_exists('WC_Payment_Gateway')) {
		return;
	}

	require_once(plugin_basename('includes/class-wc-gw-islandpay.php'));
	add_filter('woocommerce_payment_gateways', 'wc_islandpay_add_gateway');
}

/**
 * Add the gateway to WooCommerce
 *
 * @param $methods
 *
 * @return array
 */
function wc_islandpay_add_gateway($methods)
{
	$methods[] = 'WC_Gateway_IslandPay';

	return $methods;
}
