<?php
/**
 * Collapsible Content Plugin
 *
 * @package     KnowTheCode\CollapsibleContent
 * @author      Vicky Kumar
 * @license     GPL-2.0+
 * @link        https://bloggershout.com
 *
 * @wordpress-plugin
 * Plugin Name: Collapsible Content
 * Plugin URI:  https://bloggershout.com
 * Description: Collapsible Content Plugin Demo
 * Version:     1.0.0
 * Author:      Vicky Kumar
 * Author URI:  https://bloggershout.com
 * Text Domain: collapsible_content
 * Requires WP:  4.5
 * Requires PHP: 5.4
 */

namespace KnowTheCode\CollapsibleContent;
if ( ! defined( 'ABSPATH' ) ) {
	die( "Oh, silly, there's nothing to see here." );
}
define( 'COLLAPSIBLE_CONTENT_PLUGIN', __FILE__ );
define( 'COLLAPSIBLE_CONTENT_DIR', plugin_dir_path( __FILE__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'COLLAPSIBLE_CONTENT_URL', $plugin_url );
define( 'COLLAPSIBLE_CONTENT_TEXT_DOMAIN', 'collapsible_content' );
include __DIR__.'/src/plugin.php';