<?php
/**
 * Plugin Hnadler
 *
 * Package  ${NAMESPACE}
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

/**
 *
 * Enqueue the scripts for our plugin
 *
 * @since 1.0.0
 *
 *
 * @return void
 */

function enqueue_assets() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script(
		'collapsible-content-plugin-script',
		COLLAPSIBLE_CONTENT_URL . 'assets/dist/js/jquery.plugin.min.js',
		array( 'jquery' ),
		'1.0.0',
		true );
}

/**
 * Autoload plugin files
 *
 * @since 1.0.0
 *
 *
 * @return void
 */

function autoload() {
	$files = array(
		'shortcode/shortcodes.php',
	);
	foreach ( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}

}

autoload();