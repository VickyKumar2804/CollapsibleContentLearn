<?php
/**
 * Taxonomy
 *
 * Package  KnowTheCode\CollapsibleContent\FAQ\Custom
 * @since   1.0.0
 * @author  Vicky Dalmia
 * @link    https://bloggershout.com
 * @license GNU General Public License 2.0+
 */

namespace KnowTheCode\CollapsibleContent\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );
/**
 * Register the taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomy() {
	$args = array(
		'label'             => __( 'Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'            => get_taxonomy_label_config( 'Topic', 'Topics' ),
		'hierarchical'      => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'topics', array( 'faq' ), $args );
}

function get_taxonomy_label_config( $singular_name, $plural_name, $menu_label = '' ) {
	if ( ! $menu_label ) {
		$menu_label = $plural_name;
	}

	return array(
		'name'                       => _x( $plural_name, 'taxonomy general name', FAQ_MODULE_TEXT_DOMAIN ),
		'singular_name'              => _x( $singular_name, 'taxonomy singular name', FAQ_MODULE_TEXT_DOMAIN ),
		'search_items'               => __( "Search {$plural_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'popular_items'              => __( "Popular {$plural_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'all_items'                  => __( "All {$plural_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( "Edit {$singular_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'view_item'                  => __( "View {$singular_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'update_item'                => __( "Update {$singular_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'add_new_item'               => __( "Add New {$singular_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'new_item_name'              => __( "New {$singular_name} Name", FAQ_MODULE_TEXT_DOMAIN ),
		'separate_items_with_commas' => __( "Separate {$plural_name} with commas", FAQ_MODULE_TEXT_DOMAIN ),
		'add_or_remove_items'        => __( "Add or remove {$plural_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'choose_from_most_used'      => __( "Choose from the most used {$plural_name}", FAQ_MODULE_TEXT_DOMAIN ),
		'not_found'                  => __( "No {$plural_name} found.", FAQ_MODULE_TEXT_DOMAIN ),
		'menu_name'                  => $menu_label,
	);
}