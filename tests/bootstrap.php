<?php
/**
 * PHPUnit bootstrap file
 *
 * @since 0.1.0
 */

ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );

global $_wp_core_dir, $_plugin_dir;

$_tests_dir   = getenv( 'WP_TESTS_DIR' );
$_wp_core_dir = getenv( 'WP_CORE_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! $_wp_core_dir ) {
	$_wp_core_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress';
}

if ( ! $_plugin_dir ) {
	$_plugin_dir = dirname( dirname( __FILE__ ) );
}

if ( ! file_exists( "{$_tests_dir}/includes/functions.php" ) ) {
	throw new Exception( "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" );
}

// Include composer autoload.
require "{$_plugin_dir}/vendor/autoload.php";

// Give access to tests_add_filter() function.
require_once "{$_tests_dir}/includes/functions.php";

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );
/**
 * Callback for WordPress 'muplugins_loaded' action.
 *
 * Manually load the plugin being tested.
 *
 * @since 0.1.0
 */
function _manually_load_plugin() {
	global $_plugin_dir;

	require "{$_plugin_dir}/exclude-postmeta-form-keys.php";
}

// Start up the WP testing environment.
require "{$_tests_dir}/includes/bootstrap.php";
require "{$_plugin_dir}/tests/class-test-case.php";
