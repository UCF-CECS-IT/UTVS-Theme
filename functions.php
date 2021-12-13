<?php
namespace UTVS\Theme;

define( 'UTVS_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once UTVS_THEME_DIR . 'includes/config.php';
include_once UTVS_THEME_DIR . 'includes/meta.php';

include_once UTVS_THEME_DIR . 'includes/custom-post-types.php';
include_once UTVS_THEME_DIR . 'includes/custom-taxonomy.php';
include_once UTVS_THEME_DIR . 'includes/post-list-layouts.php';

// function activation_dependency_check( $oldtheme_name, $oldtheme ) {

// 	// Require ACF PRO
// 	if ( ! class_exists( 'acf_pro' ) ) {
// 		switch_theme( $oldtheme->stylesheet );
//         wp_die( __( 'Please install and activate Advanced Custom Fields Pro.', 'acf-addon-slug' ), 'Plugin dependency check', array( 'back_link' => true ) );
// 	}

// 	if ( ! class_exists( 'UCF_Post_List_Common' ) ) {
// 		switch_theme( $oldtheme->stylesheet );
//         wp_die( __( 'Please install and activate the UCF Post List Shortcode plugin.', 'ucf-post-list-addon-slug' ), 'Plugin dependency check', array( 'back_link' => true ) );
// 	}

// 	if ( ! class_exists( 'UCF_People_PostType' ) ) {
// 		switch_theme( $oldtheme->stylesheet );
//         wp_die( __( 'Please install and activate the UCF People CPT plugin.', 'ucf-people-addon-slug' ), 'Plugin dependency check', array( 'back_link' => true ) );
// 	}
// }

// add_action( 'after_switch_theme', 'activation_dependency_check', 10, 2 );
