<?php
function o2s_register_post_types() {
	$showcase_labels = array(
		'name'               => _x( 'Showcase', 'post type general name', 'o2s' ),
		'singular_name'      => _x( 'Showcase', 'post type singular name', 'o2s' ),
		'menu_name'          => _x( 'Showcase', 'admin menu', 'o2s' ),
		'name_admin_bar'     => _x( 'Showcase', 'add new on admin bar', 'o2s' ),
		'add_new'            => _x( 'Add New', 'showcase', 'o2s' ),
		'add_new_item'       => __( 'Add New Showcase', 'o2s' ),
		'new_item'           => __( 'New Showcase', 'o2s' ),
		'edit_item'          => __( 'Edit Showcase', 'o2s' ),
		'view_item'          => __( 'View Showcase', 'o2s' ),
		'all_items'          => __( 'All Showcase', 'o2s' ),
		'search_items'       => __( 'Search Showcase', 'o2s' ),
		'parent_item_colon'  => __( 'Parent Showcase:', 'o2s' ),
		'not_found'          => __( 'No showcase found.', 'o2s' ),
		'not_found_in_trash' => __( 'No showcase found in Trash.', 'o2s' )
	);

	$showcase_args = array(
		'labels'             => $showcase_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'showcase' ),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-star-filled'
	);

	register_post_type( 'showcase', $showcase_args );

    $service_labels = array(
		'name'               => _x( 'Services', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Services', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'service', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Service', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Service', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Service', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Service', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Services', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Services', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Services:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No services found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No services found in Trash.', 'your-plugin-textdomain' )
	);

	$service_args = array(
		'labels'             => $service_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-admin-tools'
	);

	register_post_type( 'service', $service_args );
}
add_action( 'init', 'o2s_register_post_types' );
