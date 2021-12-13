<?php

function year_taxonomy() {
	$singular = 'Year';
	$plural = 'Years';
	$slug = 'year';

	$labels = array(
		'name'                       => _x( $plural, 'Taxonomy General Name', 'utvs' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'utvs' ),
		'menu_name'                  => __( $plural, 'utvs' ),
		'all_items'                  => __( 'All ' . $plural, 'utvs' ),
		'parent_item'                => __( 'Parent ' . $singular, 'utvs' ),
		'parent_item_colon'          => __( 'Parent :' . $singular, 'utvs' ),
		'new_item_name'              => __( 'New ' . $singular . ' Name', 'utvs' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'utvs' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'utvs' ),
		'update_item'                => __( 'Update ' . $singular, 'utvs' ),
		'view_item'                  => __( 'View ' . $singular, 'utvs' ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'utvs' ),
		'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'utvs' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'utvs' ),
		'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'utvs' ),
		'search_items'               => __( 'Search ' . $plural, 'utvs' ),
		'not_found'                  => __( 'Not Found', 'utvs' ),
		'no_terms'                   => __( 'No items', 'utvs' ),
		'items_list'                 => __( $plural . ' list', 'utvs' ),
		'items_list_navigation'      => __( $plural . ' list navigation', 'utvs' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => array(
			'slug'         => $slug,
			'hierarchical' => true,
			'ep_mask'      => EP_PERMALINK | EP_PAGES
		)
	);

	register_taxonomy( 'year', array( 'presenter', 'presentation_archive', 'person' ), $args );
}

add_action( 'init', 'year_taxonomy', 5 );
