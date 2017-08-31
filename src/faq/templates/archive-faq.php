<?php
/**
 * Description
 *
 * Package  KnowTheCode\CollapsibleContent\FAQ\Templates
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\FAQ\Templates;

remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', __NAMESPACE__ . '\faq_do_loop' );

function faq_do_loop() {
	$records = custom_retrieve_datas_archive_page( 'faq', 'topics' );
	if ( ! $records ) {
		echo '<p>Soryy there is no records<p>';
	}

	foreach ( $records as $record ) {
		include( __DIR__ . '/views/container.php' );
	}
}

function loop_and_render_faqs( array $faqs ) {

	$attributes = array(
		'show_icon' => 'dashicons dashicons-arrow-down-alt2',
		'hide_icon' => 'dashicons dashicons-arrow-up-alt2'
	);

	foreach ( $faqs as $faq ) {
		$hidden_content = do_shortcode( $faq['post_content'] );
		include( __DIR__ . '/views/faq.php' );
	}

}

genesis();