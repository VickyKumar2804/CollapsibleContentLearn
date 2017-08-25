<?php
/**
 * Shortcode processing
 *
 * Package  KnowTheCode\CollapsibleContent\Shortcode;
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\Shortcode;
add_shortcode( 'qa', __NAMESPACE__ . '\process_the_shortcode' );
add_shortcode( 'teaser', __NAMESPACE__ . '\process_the_shortcode' );
/**
 * Process the FAQ Shortcode to build a list of FAQs.
 *
 * @since 1.0.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance
 * @param string|null $content Content between the opening and closing shortcode elements
 * @param string $shortcode_name Name of the shortcode
 *
 * @return string
 */
function process_the_shortcode( $user_defined_attributes, $content, $shortcode_name ) {
	$config                  = get_shortcode_configuration( $shortcode_name );
	$attributes              = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);
	$attributes['show_icon'] = esc_attr( $attributes['show_icon'] );
	if ( $content ) {
		$hidden_content = do_shortcode( $content );
	}
	ob_start();
	include( $config['view'] );

	return ob_get_clean();
}

/**
 *
 * Runtime Congiguration For Shortcodes
 *
 * @since 1.0.0
 *
 * @param shortcode name.
 *
 *
 * @return array runtime config array
 */
function get_shortcode_configuration( $shortcode_name ) {
	$config = array(
		'view'     => __DIR__ . '/views/' . $shortcode_name . '.php',
		'defaults' => array(
			'show_icon' => 'dashicons dashicons-arrow-down-alt2',
			'hide_icon' => 'dashicons dashicons-arrow-up-alt2'
		),
	);

	if ( $shortcode_name == 'qa' ) {
		$config['defaults']['question'] = '';

	} elseif ( $shortcode_name == 'teaser' ) {
		$config['defaults']['visible_message'] = '';
	}

	return $config;

}