<?php
/**
 * Description
 *
 * Package  KnowTheCode\CollapsibleContent\FAQ
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\FAQ;

use function KnowTheCode\CollapsibleContent\FAQ\Custom\register_faq_custom_post_type;

define( 'FAQ_MODULE_TEXT_DOMAIN', COLLAPSIBLE_CONTENT_TEXT_DOMAIN );

function autoload() {
	$files = array(
		'custom/post-type.php',
		'custom/taxonomy.php',
		'shortcode/shortcode.php',
		'templates/helpers.php'

	);
	foreach ( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();

register_activation_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ . '\activate_plugin_task' );

function activate_plugin_task() {
	register_faq_custom_post_type();
	flush_rewrite_rules();
}

register_deactivation_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ . '\deactivation_task' );

function deactivation_task() {
	delete_option( 'rewrite_rules' );
}