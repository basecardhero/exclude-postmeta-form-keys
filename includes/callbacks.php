<?php
/**
 * General callbacks.
 *
 * @since 0.1.0
 *
 * @package Exclude_Postmeta_Form_Keys
 */

namespace Exclude_Postmeta_Form_Keys\Callbacks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

\add_filter( 'postmeta_form_keys', __NAMESPACE__ . '\postmeta_form_keys', 10, 2 );
/**
 * Callback for WordPress 'postmeta_form_keys' filter.
 *
 * While creating or editing an existing WooCommerce product,
 * the postmeta form keys query was taking 10+ seconds to execute.
 * This is very long and would sometimes cause a timeout error.
 *
 * If the wp_posts table is large enough the postmeta_form_keys query
 * becomes very slow.
 *
 * Setting the $keys to an empty array will cause the postmeta_form_keys query
 * to skip.
 *
 * @since 0.1.0
 *
 * @param array|null $keys    The post meta keys.
 * @param \WP_Post   $wp_post The current post object.
 *
 * @return array The post meta keys.
 */
function postmeta_form_keys( $keys, $wp_post ) {
	$screen = \get_current_screen();

	if ( ! empty( $screen->id ) && 'order' === $screen->id ) {
		$keys = [];
	}

	return $keys;
}
