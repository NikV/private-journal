<?php
/**
 * Plugin Name: Private Journal
 */

add_action( 'init', 'private_journal_init' );
/**
 * Register a Entry post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function private_journal_init() {
	$labels = array(
		'name'               => _x( 'Entries', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Entry', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Journal Entries', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Entry', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Entry', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Entry', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Entry', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Entry', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Entry', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Entries', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Entries', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Entries:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Entries found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Entries found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Entry' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor')
	);

	register_post_type( 'pj_entry', $args );
}

function pj_date_after_title( $data ) {


		$data['post_title'] = $data['post_name'] = $data['post_date'];

	return $data;
}

add_filter( 'wp_insert_post_data', 'status_title_filter' );