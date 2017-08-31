<?php
/**
 * Helper Function
 *
 * Package  KnowTheCode\CollapsibleContent\FAQ\Templates;
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\FAQ\Templates;

add_filter( 'archive_template', __NAMESPACE__ . '\load_plugin_template' );

function load_plugin_template( $theme_archive_template ) {

	if ( ! is_post_type_archive( 'faq' ) ) {
		return $theme_archive_template;
	}

	if ( ! $theme_archive_template ) {
		return __DIR__ . '/archive-faq.php';
	}

	if ( strpos( $theme_archive_template, 'archive-faq.php' ) === false ) {
		return __DIR__ . '/archive-faq.php';
	}

	return $theme_archive_template;

}


function custom_retrieve_datas_archive_page( $post_type, $taxonomy_type ) {

	$records = database_custom_call( $post_type, $taxonomy_type );

	$groupings = array();
	foreach ( $records as $record ) {

		$term_id = (int) $record->term_id;
		$post_id = (int) $record->post_id;

		if ( ! array_key_exists( $term_id, $groupings ) ) {
			$groupings[ $term_id ] = array(
				'term_id'   => $term_id,
				'term_name' => $record->term_name,
				'term_slug' => $record->term_slug,
				'posts'     => array(),

			);
		}

		$groupings[ $term_id ]['posts'][ $post_id ] = array(
			'post_id'      => $post_id,
			'post_title'   => $record->post_title,
			'post_content' => $record->post_content,
		);

	}
	return $groupings;

}


function database_custom_call( $post_type, $taxonomy_type ) {
	global $wpdb;

	$sql = "SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, p.ID AS post_id, p.post_title, p.post_content, p.menu_order
	FROM {$wpdb->term_taxonomy} AS tt
	INNER JOIN {$wpdb->terms} AS t ON (tt.term_id = t.term_id)
	INNER JOIN {$wpdb->term_relationships} AS tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id)
	INNER JOIN {$wpdb->posts} AS p ON (tr.object_id = p.ID)
	WHERE p.post_status = 'publish' AND p.post_type = %s AND tt.taxonomy = %s
	GROUP BY t.term_id, p.ID
	ORDER BY t.term_id, p.menu_order ASC;";

	$sql_query = $wpdb->prepare( $sql, $post_type, $taxonomy_type );

	$records = $wpdb->get_results( $sql_query );

	if ( ! $records || ! is_array( $records ) ) {
		return false;
	}
	return $records;
}