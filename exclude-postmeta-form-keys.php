<?php
/**
 * Plugin Name: Exclude Postmeta Form Keys for WooCommerce
 * Description: Exclude postmeta form keys for products within WordPress admin.
 * Plugin URI: https://basecardhero.com
 * Author: BaseCardHero
 * Author URI: https://basecardhero.com
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: exclude-postmeta-form-keys
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Exclude_Postmeta_Form_Keys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EXCLUDE_POSTMETA_FORM_KEYS_FILE', __FILE__ );
define( 'EXCLUDE_POSTMETA_FORM_KEYS_DIRECTORY', dirname( EXCLUDE_POSTMETA_FORM_KEYS_FILE ) );

require_once EXCLUDE_POSTMETA_FORM_KEYS_DIRECTORY . '/includes/callbacks.php';
