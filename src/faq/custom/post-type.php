<?php
/**
 * Custom Post Type
 *
 * Package  KnowTheCode\CollapsibleContent\FAQ\Custom
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_faq_custom_post_type' );
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_custom_post_type() {
	$features   = get_all_post_type_features( 'post', array(
		'comments',
		'trackbacks',
		'custom-fields',
		'excerpt',
		'thumbnail',
	) );
	$features[] = 'page-attributes';
	$args       = array(
		'label'         => __( 'FAQs', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'        => get_post_type_labels_config( 'faq', 'FAQ', 'FAQs' ),
		'supports'      => $features,
		'public'        => true,
		'menu_position' => 5,
		'has_archive'   => true,

	);

	register_post_type( 'faq', $args );
}

/**
 * Get the configuration label for the post type
 *
 * @since 1.0.0
 *
 * @param string $post_type
 *
 * @type string $singular_label
 * @type string $plural_label .
 *
 * @return array of labels
 */
function get_post_type_labels_config( $post_type, $singular_label, $plural_label ) {
	return array(
		'name'               => _x( $plural_label, 'post type general name', FAQ_MODULE_TEXT_DOMAIN ),
		'singular_name'      => _x( $singular_label, 'post type singular name', FAQ_MODULE_TEXT_DOMAIN ),
		'menu_name'          => _x( $plural_label, 'admin menu', FAQ_MODULE_TEXT_DOMAIN ),
		'name_admin_bar'     => _x( $singular_label, 'add new on admin bar', FAQ_MODULE_TEXT_DOMAIN ),
		'add_new'            => _x( 'Add New', $post_type, FAQ_MODULE_TEXT_DOMAIN ),
		'add_new_item'       => __( 'Add New ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'new_item'           => __( 'New ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'edit_item'          => __( 'Edit ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'view_item'          => __( 'View ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'all_items'          => __( 'All ' . $plural_label, FAQ_MODULE_TEXT_DOMAIN ),
		'search_items'       => __( 'Search ' . $plural_label, FAQ_MODULE_TEXT_DOMAIN ),
		'parent_item_colon'  => __( 'Parent ' . $plural_label, FAQ_MODULE_TEXT_DOMAIN ),
		'not_found'          => __( 'No ' . $plural_label . ' found.', FAQ_MODULE_TEXT_DOMAIN ),
		'not_found_in_trash' => __( 'No ' . $plural_label . ' found in Trash.', FAQ_MODULE_TEXT_DOMAIN )
	);
}

//function get_all_post_supports( $post_type = 'post', array $exclude_features = array() ) {
//
//	$configured_features = get_all_post_type_supports( $post_type );
//	if ( ! $exclude_features ) {
//		return array_keys( $configured_features );
//	}
//	$features = array();
//	foreach ( $configured_features as $feature => $value ) {
//		if ( in_array( $feature, $exclude_features ) ) {
//			continue;
//		}
//		$features[] = $feature;
//	}
//
//	return $features;
//
//}
function get_all_post_type_features( $post_type = 'post', $exclude_features = array() ) {
	$configured_features = get_all_post_type_supports( $post_type );
	//ddd($configured_features);
	if ( ! $exclude_features ) {
		return array_keys( $configured_features );
	}
	$features = array();
	foreach ( $configured_features as $feature => $value ) {
		if ( in_array( $feature, $exclude_features ) ) {
			continue;
		}
		$features[] = $feature;
	}

	return $features;
}