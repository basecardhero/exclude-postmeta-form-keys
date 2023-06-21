<?php
/**
 * General callbacks tests.
 *
 * @since 0.1.0
 */

namespace Exclude_Postmeta_Form_Keys\Tests\Callbacks;

use Exclude_Postmeta_Form_Keys\Tests\Test_Case;
use function Exclude_Postmeta_Form_Keys\Callbacks\postmeta_form_keys;

/**
 * General callbacks tests.
 *
 * @since 0.1.0
 */
class Callbacks_Test extends Test_Case {
	/** @test */
	public function postmeta_form_keys_has_a_callback() {
		$this->assertEquals(
			10,
			\has_filter( 'postmeta_form_keys', 'Exclude_Postmeta_Form_Keys\Callbacks\postmeta_form_keys' )
		);
	}

	/** @test */
	public function postmeta_form_keys_will_return_keys_if_keys_parameter_is_not_null() {
		$keys = [ 'some_key' ];

		$this->assertEquals( $keys, postmeta_form_keys( $keys, null ) );
	}

	/** @test */
	public function postmeta_form_keys_will_return_null_if_current_screen_is_not_set() {
		global $current_screen;
		$current_screen = null;

		$this->assertEquals( null, postmeta_form_keys( null, null ) );
	}

	/** @test */
	public function postmeta_form_keys_will_return_null_if_current_screen_id_is_not_valid() {
		global $current_screen;
		$current_screen     = new \stdClass();
		$current_screen->id = 'page';

		$this->assertEquals( null, postmeta_form_keys( null, null ) );
	}

	/**
	 * @test
	 *
	 * @testWith
	 * ["product", []]
	 * ["shop_order", []]
	 */
	public function postmeta_form_keys_will_return_empty_array_if_current_screen_id_is_valid( $screen_id, $expected ) {
		global $current_screen;
		$current_screen     = new \stdClass();
		$current_screen->id = $screen_id;

		$this->assertEquals( $expected, postmeta_form_keys( null, null ) );
	}
}
