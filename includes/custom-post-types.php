<?php

function get_cpt_labels( $singular, $plural) {
	return array(
		'name'                  => _x( $plural, 'Post Type General Name', 'utvs' ),
		'singular_name'         => _x( $singular, 'Post Type Singular Name', 'utvs' ),
		'menu_name'             => __( $plural, 'utvs' ),
		'name_admin_bar'        => __( $singular, 'utvs' ),
		'archives'              => __( $plural . ' Archives', 'utvs' ),
		'parent_item_colon'     => __( 'Parent ' . $singular . ':', 'utvs' ),
		'all_items'             => __( 'All ' . $plural, 'utvs' ),
		'add_new_item'          => __( 'Add New ' . $singular, 'utvs' ),
		'add_new'               => __( 'Add New', 'utvs' ),
		'new_item'              => __( 'New ' . $singular, 'utvs' ),
		'edit_item'             => __( 'Edit ' . $singular, 'utvs' ),
		'update_item'           => __( 'Update ' . $singular, 'utvs' ),
		'view_item'             => __( 'View ' . $singular, 'utvs' ),
		'search_items'          => __( 'Search ' . $plural, 'utvs' ),
		'not_found'             => __( 'Not found', 'utvs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'utvs' ),
		'featured_image'        => __( 'Featured Image', 'utvs' ),
		'set_featured_image'    => __( 'Set featured image', 'utvs' ),
		'remove_featured_image' => __( 'Remove featured image', 'utvs' ),
		'use_featured_image'    => __( 'Use as featured image', 'utvs' ),
		'insert_into_item'      => __( 'Insert into ' . $singular, 'utvs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'utvs' ),
		'items_list'            => __( $plural . ' list', 'utvs' ),
		'items_list_navigation' => __( $plural . ' list navigation', 'utvs' ),
		'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'utvs' ),
	);
}

function get_cpt_args( $singular, $plural, $icon ) {
	$labels = get_cpt_labels( $singular, $plural );

	$args = array(
		'label'                 => __( $plural, 'utvs' ),
		'description'           => __( $plural, 'utvs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'post_tag', 'category', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => $icon,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);

	return $args;
}

function presenter_post_type() {
	$args = get_cpt_args( 'Presenter', 'Presenters', 'dashicons-id-alt' );

	register_post_type( 'presenter', $args );
}

add_action( 'init', 'presenter_post_type', 0);

function presentation_archive_post_type() {
	$args = get_cpt_args( 'Presentation Archive', 'Presentation Archives', 'dashicons-video-alt' );

	register_post_type( 'presentation_archive', $args );
}

add_action( 'init', 'presentation_archive_post_type', 0);
